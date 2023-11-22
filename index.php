<?php 
          
        include "config.php";
        

        if(isset($_POST['submit'])){
             $id = $_POST['id'];
             $name = $_POST['name'];
             $email = $_POST['email'];
             $phone = $_POST['phone'];
             $title = $_POST['title'];
             $created = $_POST['created'];

            
        

        $sql = "INSERT INTO contacts (id, name, email, phone, title, created) VALUES ('$id', '$name', '$email', '$phone', $title', $created')";

        $result = $conn->query($sql);

        if($result == TRUE){
        echo "Contact Succesfully Add!!!";
        }
        else{
        echo "ERROR!!!".$sql."<br>". $conn->error;
        }
        $conn->close();
}       


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

     <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: url("https://img.freepik.com/premium-photo/mountain-range-with-mountain-landscape-mountains-background_950347-11601.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.9;
}
h1 {
    text-align: center;
    font-style: italic;
    font-family: "Times New Roman", Times, serif;
    font-weight: 70;
    font-size: 30px;
    color: white;
   
}

#contactsForm {
    background-color: #ffffff2f;
    max-width: 350px;
    margin: 0 auto;
    padding: 20px;
    border: 8px solid #ccc;
    border-radius: 8px;
    box-shadow: 1 1 10px rgba(0, 0, 0, 0.1);
}

label {
    color: white;
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select,
input[type="title"] {
    opacity: 0.9;
    width: 95%;
    padding: 8px;
    margin-bottom: 5px;
    border: 4px solid #ccc;
    border-radius: 10px;
    height: 8px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

h2 {
    text-align: center;
    margin-top: 20px;
    color: white;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffffffa3;
    opacity: 0.9;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
}

.edit, .delete {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.edit {
    background-color: #28a745;
}

.edit:hover, .delete:hover {
    background-color: #0056b3;
}

     </style>

    <h1>Contacts Form</h1>
    <form id="contactsForm">

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="Email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" required><br><br>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="create">Created:</label>
        <input type="text" id="created" name="created" required><br><br>
        
        <input type="submit" name="submit"  value="Submit">
    </form>

    <h2>Contacts List</h2>
    <table id="contactsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Title</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    
    <script>

        const contactsForm = document.getElementById('contactsForm');
        const contactsTable = document.getElementById('contactsTable');
        const tbody = contactsTable.querySelector('tbody');

        contactsForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${this.id.value}</td>
                <td>${this.name.value}</td>
                <td>${this.email.value}</td>
                <td>${this.phone.value}</td>
                <td>${this.title.value}</td>
                <td>${this.created.value}</td>
                <td><button class="edit">Edit</button> <button class="delete">Delete</button></td>
            `;

            newRow.querySelector('.edit').addEventListener('click', function () {
                const row = this.closest('tr');
                contactsForm.id.value = row.cells[0].textContent;
                contactsForm.name.value = row.cells[1].textContent;
                contactsForm.email.value = row.cells[2].textContent;
                contactsForm.phone.value = row.cells[3].textContent;
                contactsForm.title.value = row.cells[4].textContent;
                contactsForm.created.value = row.cells[5].textContent;
                row.remove();
            });

            newRow.querySelector('.delete').addEventListener('click', function () {
                this.closest('tr').remove();
            });

            tbody.appendChild(newRow);
            contactsForm.reset();
        });

    </script>




</body>
</html>


    
