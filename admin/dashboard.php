<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/


session_start();

include('../config.php');
include('../common/db.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        session_destroy();

        header('Location: ' . URL . '/index.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'del') {
        $query = 'DELETE FROM user WHERE id = ' . $_POST['id'];

        $mysqli->query($query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
</head>

<body>
    <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserModalLabel">+ New user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto">
                    <form class="form-1" id="editUserForm">
                        <div class="item">
                            <div class="input">
                                <input type="text" name="username" placeholder="Username" disabled>
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <span>Role</span>
                            <div class="input">
                                <select name="role">
                                    <option value="user" selected>User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <span>Account status</span>
                            <div class="input">
                                <select name="active">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <span>Resident</span>
                            <div class="input">
                                <select name="resident">
                                    <option value="KK1" selected>KK1</option>
                                    <option value="KK2" selected>KK2</option>
                                    <option value="KK3" selected>KK3</option>
                                    <option value="KK4" selected>KK4</option>
                                    <option value="KK5" selected>KK5</option>
                                </select>
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <div class="input">
                                <input type="text" name="firstname" placeholder="Firstname">
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <div class="input">
                                <input type="text" name="lastname" placeholder="Lastname">
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <div class="input">
                                <input type="text" name="matrixId" placeholder="Matrics Id">
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <div class="input">
                                <input type="text" name="phoneNum" placeholder="Phone number">
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                        <div class="item">
                            <div class="input">
                                <input type="email" name="email" placeholder="Email">
                                <div class="status">
                                    <div class="anim-icon">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <label>Error</label>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="updateUser()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!isset($_SESSION['userid'])) {
        return header('Location: ' . URL . '/login.php');
    }

    $query = 'SELECT * FROM user WHERE id = ' . $_SESSION['userid'];

    $firstName = '';
    $lastName = '';
    $subName = '';

    if ($res = $mysqli->query($query)) {
        if ($res->num_rows > 0) {
            $user = $res->fetch_assoc();

            $firstName = $user['firstname'];
            $lastName = $user['lastname'];
            $subName = (isset($user['matrixId'])) ? $user['matrixId'] : $user['email'];
        } else {
            header('Location: ' . URL . '/login.php');
        }
    } else {
        header('Location: ' . URL . '/login.php');
    }

    ?>

    <section class="wrapper">
        <section class="topbar">
            <div class="title">UMP Parcel - Dashboard</div>

            <div class="date" id="datetime">
                <div class="day"></div>
                <div class="date"></div>
            </div>
            <a href="#" onclick="logout()" class="btn-logout">
                <i class="fas fa-door-open"></i>
                Logout
            </a>
            <a href="#" class="btn-profile" onclick="selectUpdateUser('<?php echo $_SESSION['username']; ?>');">
                <i class="fas fa-cog"></i>
            </a>
            <div class="bg"></div>
        </section>
        <section class="sidebar">
            <div class="header">
                <div class="bg">
                    <div class="stripe-1"></div>
                    <div class="stripe-2"></div>
                </div>
            </div>
            <div class="logo">
                <img src="../res/logo/Logo UMP-Official.png" alt="">
            </div>

            <div class="body">
                <div class="user-details">
                    <div class="avatar">
                        <div class="photo">
                            <img src="../res/placeholder/user-photo.png" alt="">
                        </div>
                        <div class="role">Admin</div>
                    </div>
                    <div class="title">
                        <div class="name"><?php echo $firstName ?></div>
                        <div class="sub"><?php echo $subName ?></div>
                    </div>
                </div>

                <nav class="navlinks">
                    <a href="./dashboard.php" class="link active">
                        <i class="far fa-chart-bar"></i>
                        Dashboard
                    </a>
                    <a href="./users.php" class="link">
                        <i class="fas fa-user-friends"></i>
                        Manage users
                    </a>
                </nav>
            </div>


        </section>

        <section class="content">
            <div class="stat-cards">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <div class="value" id="totalUsers">-</div>
                    <div class="label">Total users</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-users-slash"></i>
                    <div class="value" id="totalDisabled">-</div>
                    <div class="label">Total inactive users</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-clock"></i>
                    <div class="value" id="lastActivity">-</div>
                    <div class="label">Last user activity</div>
                </div>
            </div>

            <div class="charts">
                <div class="cont" style="flex: 0 1 100%;">
                    <div class="header">
                        <div class="title">User activity</div>
                    </div>

                    <div class="body">
                        <canvas id="chartUserActivity" height="250"></canvas>
                    </div>
                </div>
                <div class="cont">
                    <div class="header">
                        <div class="title">Users by role</div>
                    </div>

                    <div class="body">
                        <canvas id="chartUsersByRole"></canvas>
                    </div>
                </div>
                <div class="cont">
                    <div class="header">
                        <div class="title">Users by Resident</div>
                    </div>

                    <div class="body">
                        <canvas id="chartUsersByRes"></canvas>
                    </div>
                </div>
                <!-- 
                    users by role
                    users by resident
                 -->
            </div>
        </section>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const matrixRegex = /^([A-Z]{2}[0-9]{5})$/;
        const phoneNumRegex = /^\+([0-9]{12})$/;

        const validateEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        };

        const updateResidentNav = async x => {
            $('#resNav > .nav').each((i, nav) => {
                $(nav).removeClass('active');
            });

            $($('#resNav > .nav')[x]).addClass('active');
        };

        const loadTotalUsers = async () => {
            const totals = [];

            for (let x = 0; x <= 5; x++) {
                const n = await $.get('http://localhost/sites/ump-parcel/admin/getUsers.php?r=' + x);

                if (n === '') {
                    totals.push(0);
                } else {
                    totals.push(JSON.parse(n).length);
                }
            }

            $('#resNav > .nav').each((x, nav) => {
                $(nav).find('.count').html(totals[x]);
            });
        };

        function updateDateTime() {
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            // datetime
            const now = new Date(Date.now());

            const datetimeElem = document.querySelector('#datetime');

            datetimeElem.querySelector('.day').innerHTML = days[now.getDay()];
            datetimeElem.querySelector('.date').innerHTML = now.toString().split(' ').splice(1, 4).join(' ');
        }

        async function loadCharts() {
            const kks = ['KK1', 'KK2', 'KK3', 'KK4', 'KK5'];
            const roles = ['User', 'Admin'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            const userActivity = JSON.parse(await $.get('./getUserActivity.php'));
            const usersByKK = [];
            const usersByRole = [];

            const summary = JSON.parse(await $.get('./getUserSummary.php'));

            $('#totalUsers').html(summary.totalUsers);
            $('#totalDisabled').html(summary.totalDisabled);
            $('#lastActivity').html(summary.lastActivity);

            for (let x = 1; x <= 5; x++) {
                const u = await $.get('./getUsersCount.php?r=' + x);

                usersByKK.push(u);
            }
            for (let role of ['user', 'admin']) {
                const u = await $.get('./getUsersCount.php?role=' + role);

                usersByRole.push(u);
            }

            new Chart(document.querySelector('#chartUserActivity'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Total users',
                        backgroundColor: '#11ADA4',
                        borderColor: '#11ADA4',
                        data: userActivity,
                    }]
                },
                options: {
                    maintainAspectRatio: false
                }
            });
            new Chart(document.querySelector('#chartUsersByRole'), {
                type: 'bar',
                data: {
                    labels: roles,
                    datasets: [{
                        label: 'Total users',
                        backgroundColor: '#11ADA4',
                        borderColor: '#fff',
                        data: usersByRole,
                    }]
                },
                options: {
                    maintainAspectRatio: false
                }
            });
            new Chart(document.querySelector('#chartUsersByRes'), {
                type: 'bar',
                data: {
                    labels: kks,
                    datasets: [{
                        label: 'Total users',
                        backgroundColor: '#11ADA4',
                        borderColor: '#fff',
                        data: usersByKK,
                    }]
                },
                options: {
                    maintainAspectRatio: false
                }
            });
        }

        const logout = async () => {
            const confirm = await swal({
                title: 'Are you sure',
                text: 'You are about to logout from the system',
                icon: 'warning',
                buttons: true
            });

            if (confirm) {
                window.location.href = '?action=logout';
            }
        };

        const updateUser = async () => {

            let pass = true;
            $('#editUserForm').find('input, select').each((x, e) => {
                switch ($(e).prop('name')) {
                    case 'matrixId':
                        pass &&= matrixRegex.test($(e).val());
                        if (!matrixRegex.test($(e).val())) {
                            $(e).closest('div').find('.anim-icon').removeClass('true');
                            $(e).closest('div').find('.anim-icon').addClass('false');
                            $(e).closest('div').parent().find('label').addClass('active');
                            $(e).closest('div').parent().find('label').html('Invalid Matric Id format');
                        } else {
                            $(e).closest('div').find('.anim-icon').removeClass('false');
                            $(e).closest('div').find('.anim-icon').addClass('true');
                            $(e).closest('div').parent().find('label').removeClass('active');
                        }
                        break;
                    case 'phoneNum':
                        pass &&= phoneNumRegex.test($(e).val());
                        if (!phoneNumRegex.test($(e).val())) {
                            $(e).closest('div').find('.anim-icon').removeClass('true');
                            $(e).closest('div').find('.anim-icon').addClass('false');
                            $(e).closest('div').parent().find('label').addClass('active');
                            $(e).closest('div').parent().find('label').html('Invalid phone number format, example phone number +601234567891');
                        } else {
                            $(e).closest('div').find('.anim-icon').removeClass('false');
                            $(e).closest('div').find('.anim-icon').addClass('true');
                            $(e).closest('div').parent().find('label').removeClass('active');
                        }
                        break;
                    case 'email':
                        pass &&= validateEmail($(e).val());
                        if (!validateEmail($(e).val())) {
                            $(e).closest('div').find('.anim-icon').removeClass('true');
                            $(e).closest('div').find('.anim-icon').addClass('false');
                            $(e).closest('div').parent().find('label').addClass('active');
                            $(e).closest('div').parent().find('label').html('Invalid email');
                        } else {
                            $(e).closest('div').find('.anim-icon').removeClass('false');
                            $(e).closest('div').find('.anim-icon').addClass('true');
                            $(e).closest('div').parent().find('label').removeClass('active');
                        }
                        break;
                    default:
                        break;
                }
            });

            if (pass) {
                const confirm = await swal({
                    title: 'Update user',
                    text: 'You about to override this account information',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                });

                if (confirm) {
                    await $.post('./updateUserByUsername.php', {
                        username: $('#editUserForm input[name="username"]').val(),
                        role: $('#editUserForm select[name="role"]').val(),
                        active: ($('#editUserForm select[name="active"]').val() === 'active') ? 1 : 0,
                        resident: $('#editUserForm select[name="resident"]').val(),
                        firstname: $('#editUserForm input[name="firstname"]').val(),
                        lastname: $('#editUserForm input[name="lastname"]').val(),
                        matrixId: $('#editUserForm input[name="matrixId"]').val(),
                        phoneNum: $('#editUserForm input[name="phoneNum"]').val(),
                        email: $('#editUserForm input[name="email"]').val()
                    });

                    await swal('User updated', {
                        icon: "success",
                    });

                    window.location.reload();
                }
            }
        };

        const selectUpdateUser = async username => {
            /* get user details */
            let response = await $.get(`./getUserByUsername.php?username=${username}`);

            response = JSON.parse(response);

            if (response.status !== 200) {
                return swal({
                    title: 'Error',
                    text: response.message,
                    icon: 'error'
                });
            }

            const data = JSON.parse(response.message);

            $('#editUserForm').find('input, select').each((x, e) => {
                switch ($(e).prop('name')) {
                    case 'username':
                        $(e).val(username);
                        $(e).closest('div').find('.anim-icon').addClass('true');
                        break;
                    case 'password':
                        $(e).val('');
                        $(e).closest('div').find('.anim-icon').removeClass('false');
                        $(e).closest('div').find('.anim-icon').removeClass('true');
                        $(e).closest('div').parent().find('label').removeClass('active');
                        break;
                    case 'role':
                        $(e).val(data['role']);
                        $(e).closest('div').find('.anim-icon').addClass('true');
                        break;
                    case 'active':
                        $(e).val((data['active'] === '1' ? 'active' : 'inactive'));
                        $(e).closest('div').find('.anim-icon').addClass('true');
                        break;
                    case 'resident':
                        $(e).val(data['resident']);
                        $(e).closest('div').find('.anim-icon').addClass('true');
                        break;
                    case 'firstname':
                        $(e).val(data['firstname']);
                        $(e).closest('div').find('.anim-icon').addClass('true');
                        break;
                    case 'lastname':
                        $(e).val(data['lastname']);
                        $(e).closest('div').find('.anim-icon').addClass('true');
                        break;
                    case 'matrixId':
                        $(e).val(data['matrixId']);

                        if (matrixRegex.test($(e).val())) {
                            $(e).closest('div').find('.anim-icon').removeClass('false');
                            $(e).closest('div').find('.anim-icon').addClass('true');
                            $(e).closest('div').parent().find('label').removeClass('active');
                        } else {
                            $(e).closest('div').find('.anim-icon').removeClass('true');
                            $(e).closest('div').find('.anim-icon').addClass('false');
                            $(e).closest('div').parent().find('label').addClass('active');
                            $(e).closest('div').parent().find('label').html('Invalid Matric Id format');
                        }
                        break;
                    case 'phoneNum':
                        $(e).val(data['phoneNum']);

                        if (phoneNumRegex.test($(e).val())) {
                            $(e).closest('div').find('.anim-icon').removeClass('false');
                            $(e).closest('div').find('.anim-icon').addClass('true');
                            $(e).closest('div').parent().find('label').removeClass('active');
                        } else {
                            $(e).closest('div').find('.anim-icon').removeClass('true');
                            $(e).closest('div').find('.anim-icon').addClass('false');
                            $(e).closest('div').parent().find('label').addClass('active');
                            $(e).closest('div').parent().find('label').html('Invalid phone number format, example phone number +601234567891');
                        }
                        break;
                    case 'email':
                        $(e).val(data['email']);

                        if (validateEmail($(e).val())) {
                            $(e).closest('div').find('.anim-icon').removeClass('false');
                            $(e).closest('div').find('.anim-icon').addClass('true');
                            $(e).closest('div').parent().find('label').removeClass('active');
                        } else {
                            $(e).closest('div').find('.anim-icon').removeClass('true');
                            $(e).closest('div').find('.anim-icon').addClass('false');
                            $(e).closest('div').parent().find('label').addClass('active');
                            $(e).closest('div').parent().find('label').html('Invalid email');
                        }
                        break;
                    default:
                        break;
                }
            });

            $("#editUserModal").modal('toggle');
        };

        window.onload = function() {
            updateDateTime()
            setInterval(() => updateDateTime(), 1000);

            /* $('#resNav > .nav').each((x, nav) => {
                $(nav).on('click', () => updateResidentNav(x));
            });

            loadTotalUsers();

            updateResidentNav(0); */

            loadCharts();
        };
    </script>
</body>

</html>