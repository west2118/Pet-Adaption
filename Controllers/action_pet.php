<?php
include "../Model/pet.php";
$pet = new Pet();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['add'])) {
        $petName = $_POST['petName'];
        $petType = $_POST['petType'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $description = $_POST['description'];
        $photo = $_POST['photo'];
        $vaccinated = isset($_POST['vaccinated']) ? 1 : 0;

        $result_add = $pet->addPet($petName, $petType, $breed, $age, $gender, $description, $photo, $vaccinated);

        if ($result_add) {
            header("Location: ../View/AdminPets.php");
            exit();
        }
    } else if (isset($_POST['edit'])) {
        $petName = $_POST['petName'];
        $petType = $_POST['petType'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $description = $_POST['description'];
        $photo = $_POST['photo'];
        $vaccinated = isset($_POST['vaccinated']) ? 1 : 0;
        $pet_id = $_POST['pet_id'];

        $result_add = $pet->editPet($pet_id, $petName, $petType, $breed, $age, $gender, $description, $photo, $vaccinated);

        if ($result_add) {
            header("Location: ../View/AdminPets.php");
            exit();
        }
    } else if (isset($_POST['confirm_delete'])) {
        $delete_id = $_POST['delete_id'];

        $result = $pet->deletePet($delete_id);

        if ($result) {
            header("Location: ../View/AdminPets.php");
            exit();
        }
    }
}
