<?php
require_once 'database.php';

class Pet
{
    public $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllPets()
    {
        $sql = "SELECT * FROM tbl_pets";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllAvailablePets()
    {
        $sql = "SELECT * FROM tbl_pets WHERE status = 'available'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPetsPaginated($limit, $offset)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_pets LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPetById($pet_id)
    {
        $sql = "SELECT * FROM tbl_pets WHERE pet_id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $pet_id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc();
    }

    public function addPet($petName, $petType, $breed, $age, $gender, $description, $photo, $vaccinated)
    {
        $status = "available";
        $sql = "INSERT INTO tbl_pets (petName, petType, breed, age, gender, description, photo, vaccinated, status, date_added) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssssis", $petName, $petType, $breed, $age, $gender, $description, $photo, $vaccinated, $status);
        return $stmt->execute();
    }

    public function editPet($pet_id, $petName, $petType, $breed, $age, $gender, $description, $photo, $vaccinated)
    {
        $sql = "UPDATE tbl_pets SET petName = ?, 
                petType = ?, 
                breed = ?, 
                age = ?, 
                gender = ?, 
                description = ?, 
                photo = ?, 
                vaccinated = ? WHERE Pet_id = ?";
        $result = $this->conn->prepare($sql);
        $result->bind_param(
            "sssssssii",
            $petName,
            $petType,
            $breed,
            $age,
            $gender,
            $description,
            $photo,
            $vaccinated,
            $pet_id
        );
        return $result->execute();
    }

    public function deletePet($pet_id)
    {
        $sql = "DELETE FROM tbl_pets WHERE pet_id = ?";
        $result = $this->conn->prepare($sql);
        $result->bind_param("i", $pet_id);
        return $result->execute();
    }

    public function markAsDonated($petId)
    {
        $petSql = "UPDATE tbl_pets SET status = 'donated' WHERE Pet_id = ?";
        $stmt1 = $this->conn->prepare($petSql);
        $stmt1->bind_param("i", $petId);
        $stmt1->execute();

        return $stmt1->affected_rows > 0;
    }

    public function getFiveRecentPets()
    {
        // Make sure your tbl_pets has a column like 'date' or 'created_at'
        $sql = "SELECT * FROM tbl_pets ORDER BY date_added DESC LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // returns array of 5 pets
    }

    public function countAllPets()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_pets";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    public function countAdoptedPets()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_pets WHERE status = 'adopted'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    public function countAvailablePets()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_pets WHERE status = 'available'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    public function countPendingRequests()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_requests WHERE status = 'pending'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }
}
