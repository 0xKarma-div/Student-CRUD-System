<HTML>
<HEAD>
<TITLE>Student Management</TITLE>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.logout-btn {
    float: left;
    background: #dc3545;
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}
.logout-btn:hover {
    background: #c82333;
}
.user-info {
    float: right;
    margin-right: 15px;
    padding: 8px;
    background: #f8f9fa;
    border-radius: 4px;
}
</style>
</HEAD>
<BODY>
<div class="phppot-container">
    <div style="margin-bottom: 15px; overflow: hidden;">
        <div class="user-info">
            Welcome, <strong><?php echo $_SESSION['fname']; ?></strong> 
            (<?php echo ($_SESSION['role'] == 'admin') ? 'Admin' : 'Viewer'; ?>)
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    
    <h1>Student Management</h1>
    <a href="index.php?action=attendance" id="btn-add">View Attendance</a>
    
    <?php if($_SESSION['role'] == 'admin'): ?>
    <a href="index.php?action=student-add" id="btn-add">Add Student</a>
    <?php endif; ?>
    
    <div class="page-content">
        <table class="tutorial-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll Number</th>
                    <th>Date of Birth</th>
                    <th>Class</th>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                    <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                if (! empty($result)) {
                    foreach ($result as $row) {
                        ?>
                <tr class="table-row" id="table-row-<?php echo $row["id"]; ?>">
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["roll_number"]; ?></td>
                    <td><?php echo $row["dob"]; ?></td>
                    <td><?php echo $row["class"]; ?></td>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                    <td><a class="ajax-action-links"
                        href="index.php?action=student-edit&id=<?php echo $row["id"]; ?>">Edit</a>
                        | 
                        <a class="ajax-action-links"
                        href="index.php?action=student-delete&id=<?php echo $row["id"]; ?>">Delete</a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</BODY>
</HTML>