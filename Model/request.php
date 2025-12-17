<?php
require_once 'database.php';

class Request
{
    public $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllRequests()
    {
        $sql = "SELECT r.*, p.petName, p.petType, p.breed, p.age, p.photo
            FROM tbl_requests r
            LEFT JOIN tbl_pets p ON r.pet_id = p.pet_id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRequestById($request_id)
    {
        $sql = "SELECT * FROM tbl_requests WHERE request_id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $request_id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc();
    }

    public function addRequest($firstName, $lastName, $homeCity, $email, $contact, $petExperience, $message, $pet_id)
    {
        $status = "pending";
        $sql = "INSERT INTO tbl_requests SET firstName = ?, lastName = ?, homeCity = ?, email = ?, status = ?, contact = ?, petExperience = ?, message = ?, pet_id = ?";
        $result = $this->conn->prepare($sql);
        $result->bind_param("ssssssssi", $firstName, $lastName, $homeCity, $email, $status, $contact, $petExperience, $message, $pet_id);

        if ($result->execute()) {
            $lastId = $this->conn->insert_id;

            $year = date("Y");
            $ref_number = "PA-$year-$lastId";

            $updateSql = "UPDATE tbl_requests SET ref_number = ? WHERE request_id = ?";
            $updatedStmt = $this->conn->prepare($updateSql);
            $updatedStmt->bind_param("si", $ref_number, $lastId);
            $updatedStmt->execute();

            return $ref_number;
        }

        return false;
    }
    public function deleteRequest($request_id)
    {
        $sql = "DELETE FROM tbl_requests WHERE request_id = ?";
        $result = $this->conn->prepare($sql);
        $result->bind_param("i", $request_id);
        return $result->execute();
    }

    public function getMatchingPets($petName, $description, $petCategory)
    {
        $sql = "SELECT * FROM tbl_pets 
        WHERE (petName LIKE ? 
          OR description LIKE ?)
          AND petCategory LIKE ? 
          AND status = 'pending'";

        $petName = "%$petName%";
        $description = "%$description%";
        $petCategory = "%$petCategory%";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $petName, $description, $petCategory);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function approveRequest($requestId, $petId)
    {
        // Update pet status
        $petSql = "UPDATE tbl_pets SET status = 'approved' WHERE pet_id = ?";
        $stmt1 = $this->conn->prepare($petSql);
        $stmt1->bind_param("i", $petId);
        $stmt1->execute();

        // Update request status
        $requestSql = "UPDATE tbl_requests SET status = 'approved' WHERE request_id = ?";
        $stmt2 = $this->conn->prepare($requestSql);
        $stmt2->bind_param("i", $requestId);
        $stmt2->execute();

        return $stmt1->affected_rows > 0 && $stmt2->affected_rows > 0;
    }

    public function rejectRequest($requestId)
    {
        $sql = "UPDATE tbl_requests SET status = 'rejected' WHERE request_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $requestId);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    public function markAsAdopted($requestId, $petId)
    {
        $petSql = "UPDATE tbl_pets SET status = 'adopted' WHERE pet_id = ?";
        $stmt1 = $this->conn->prepare($petSql);
        $stmt1->bind_param("i", $petId);
        $stmt1->execute();

        $requestSql = "UPDATE tbl_requests SET status = 'completed' WHERE request_id = ?";
        $stmt2 = $this->conn->prepare($requestSql);
        $stmt2->bind_param("i", $requestId);
        $stmt2->execute();

        return $stmt1->affected_rows > 0 && $stmt2->affected_rows > 0;
    }

    public function countAllRequests()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_requests";
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

    public function countApprovedRequests()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_requests WHERE status = 'approved'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    public function countCompletedRequests()
    {
        $sql = "SELECT COUNT(*) as total FROM tbl_requests WHERE status = 'completed'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    public function getLast4Requests()
    {
        $sql = "SELECT r.*, p.petName, p.breed 
            FROM tbl_requests r
            LEFT JOIN tbl_pets p ON r.pet_id = p.pet_id
            ORDER BY r.dateSubmitted DESC
            LIMIT 4";

        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
