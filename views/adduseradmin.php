<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>

<body>

    <form id="addUserForm">
        <h2>Add User</h2>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="pname" placeholder="คำนำหน้า" required>
        <input type="text" name="fname" placeholder="ชื่อ" required>
        <input type="text" name="lname" placeholder="นามสกุล" required>
        <select name="adminstatus" required>
            <option value="Y" selected>Admin</option>
            <option value="N">User</option>
        </select>
        <button type="submit"><i class="fas fa-user-plus"></i> Add User</button>
    </form>

    <div id="response"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addUserForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/hn-online/addUser',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                        try {
                            const jsonResponse = response;
                            if (jsonResponse.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: jsonResponse.message,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: jsonResponse.message,
                                });
                            }
                        } catch (e) {
                            console.error("Response not in JSON format:", response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Response format is incorrect.',
                            });
                        }
                        $('#addUserForm')[0].reset(); // Reset form
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX error:", textStatus, errorThrown);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while adding the user.',
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
