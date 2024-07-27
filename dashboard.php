<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['id'])) {
    header('location:../');
    exit;
}

// Check if the user has already voted
$voted = isset($_SESSION['status']) && $_SESSION['status'] == 1;

// Retrieve user data from session
$data = $_SESSION['data'];

// Determine user's voting status
$status = $voted ? '<b class="text-success">Voted</b>' : '<b class="text-danger">Not voted</b>';

// Retrieve groups from session
$groups = isset($_SESSION['groups']) ? $_SESSION['groups'] : array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary text-light">
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <a href="http://localhost/onlinevote/paritals/index.php"><button class="btn btn-dark text-light px-3">Back</button></a>
            <a href="logout.php/"><button class="btn btn-dark text-light px-3">Logout</button></a>
            <h1 class="my-3">Voting System - Dashboard</h1>
        </div>
        <div class="col-md-6 text-end">
            <div>
                <strong>Name:</strong> <?php echo $data['username']; ?><br>
                <strong>Mobile:</strong> <?php echo $data['mobile']; ?><br>
                <strong>Status:</strong> <?php echo $status; ?>
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-7">
            <?php if (!empty($groups)) : ?>
                <?php foreach ($groups as $group) : ?>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <img src="../uploads/<?php echo $group['photo']; ?>" alt="Group image" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <strong class="text-dark h5">Group Name:</strong> <?php echo $group['username']; ?><br>
                            <strong class="text-dark h5">Votes:</strong> <?php echo $group['votes']; ?><br>
                            <form action="../actions/voting.php" method="post">
                                <input type="hidden" name="groupvotes" value="<?php echo $group['votes']; ?>">
                                <input type="hidden" name="groupid" value="<?php echo $group['id']; ?>">
                                <?php if (!$voted) : ?>
                                    <button class="btn btn-danger my-3 text-white px-3" type="submit">Vote</button>
                                <?php else : ?>
                                    <button class="btn btn-success my-3 text-white px-3" disabled>Voted</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="container">
                    <p>No groups to display</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
