<style>
    .dropdown-menu {
        width: 300px;
    }
    .message-item {
        display: flex;
        align-items: flex-start; /* Align items to the start of the container */
        padding: 10px;
        border-bottom: 1px solid #ddd; /* Add a border between messages */
    }
    .message-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 10px;
    }
    .message-content {
        flex: 1;
    }
    .message-sender {
        margin: 0 0 5px 0;
        font-weight: bold; /* Make sender name bold */
    }
    .message-text {
        margin: 0;
        overflow-wrap: break-word;
        word-wrap: break-word;
        hyphens: auto;
        max-width: 100%;
        line-height: 1.4; /* Increase line height for better readability */
    }
    .message-time {
        font-size: 0.8rem;
        color: #999;
        margin-top: 5px; /* Add margin between message text and time */
    }
    .notification-icon {
        position: relative;
        display: inline-block;
    }
    .notification-icon .badge {
        position: absolute;
        top: -5px;
        right: -5px;
        padding: 5px 10px;
        border-radius: 50%;
        background-color: red;
        color: white;
    }
</style>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand" href="index.php">
        <img src="assets/img/udl-sba.png" alt="pfesaadmus" class="w-100">
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- Search form can be added here -->
    </form>
    
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <?php
    // Assume $db is your database connection

    // Fetch messages from the database
    $query = "SELECT * FROM contact ORDER BY time_added DESC LIMIT 5";
    $result = mysqli_query($con, $query);

    // Get the number of messages
    $message_count = mysqli_num_rows($result);

    if ($message_count > 0) {
        echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white notification-icon" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    Messages <span class="badge">' . $message_count . '</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="messageDropdown">';
        
        // Loop through each message and generate HTML
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="message-item">
                <div class="message-avatar">
                    <i class="fas fa-user fa-fw"></i>
                </div>
                <div class="message-content">
                    <p class="message-sender">' . $row['sender_name'] . '</p>
                    <p class="message-text">' . $row['message_sent'] . '</p>
                    <p class="message-time">' . $row['time_added'] . '</p>
                </div>
                <button class="btn btn-sm btn-primary btn-reply" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-sender="' . $row['sender_email'] . '" data-bs-id="' . $row['id'] . '"><i class="fas fa-reply"></i></button>
            </div>';
            echo '<div class="dropdown-divider"></div>';
        }

        echo '</div></li>';
    } else {
        // No messages found
        echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    Messages <span class="badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="messageDropdown">
                    <p class="dropdown-item-text">No messages</p>
                </div>
              </li>';
    }

    // Close the database connection
    ?>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i> <?= $_SESSION['auth_user']['user_name']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form action="../allcode.php" method="POST">
                        <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                    </form>
                    
                </li>
            </ul>
        </li>
    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    var replyButtons = document.querySelectorAll('.btn-reply');

    replyButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var senderEmail = this.getAttribute('data-bs-sender');
            var messageId = this.getAttribute('data-bs-id');  // Get the message ID from the button attribute
            var modalRecipient = document.getElementById('recipient-name');
            var modalMessageId = document.getElementById('message-id');  // Get the hidden input for message ID
            modalRecipient.value = senderEmail;
            modalMessageId.value = messageId;  // Set the message ID in the hidden input
            myModal.show();
        });
    });
});
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Send Reply</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="send.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="email" name="email-to-reply" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Your reply here:</label>
            <textarea class="form-control" name="reply-to-sent" id="message-text"></textarea>
          </div>
          <input type="hidden" name="message-id" id="message-id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="send" class="btn btn-primary">Send reply</button>
      </div>
      </form>
    </div>
  </div>
</div>
