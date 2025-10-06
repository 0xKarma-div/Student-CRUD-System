<HTML>
<HEAD>
<TITLE>Attendance</TITLE>
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
    
    <h1>Attendance</h1>
    <a href="index.php" id="btn-add">View Student</a>
    
    <?php if($_SESSION['role'] == 'admin'): ?>
    <a href="index.php?action=attendance-add" id="btn-add">Add Attendance</a>
    <?php endif; ?>
    
    <div class="page-content">
        <table class="tutorial-table">
            <thead>
                <tr>
                    <th>Attendance Date</th>
                    <th>Present</th>
                    <th>Absent</th>
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
                <tr class="table-row" id="table-row-<?php echo $row["attendance_date"]; ?>">
                    <td><?php echo $row["attendance_date"]; ?></td>
                    <td><?php echo $row["present"]; ?></td>
                    <td><?php echo $row["absent"]; ?></td>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                    <td><a class="ajax-action-links"
                        href="index.php?action=attendance-edit&date=<?php echo $row["attendance_date"]; ?>">Edit</a>
                        | 
                        <a class="ajax-action-links"
                        href="index.php?action=attendance-delete&date=<?php echo $row["attendance_date"]; ?>">Delete</a>
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