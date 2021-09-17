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
    <title>Admin | Manage users</title>

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
                    <h5 class="modal-title" id="newUserModalLabel">Create new user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-1" id="newUserForm">
                        <div class="item">
                            <div class="input">
                                <input type="text" name="username" placeholder="Username">
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
                                <input type="password" name="password" placeholder="Password">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="createNewUserBtn" onclick="createNewUser()">Create</button>
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
            <div class="title">UMP Parcel - Manage users</div>
            <nav class="group-navs" id="resNav">
                <div href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div class="count"></div>
                    </div>
                    All
                </div>
                <div href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div class="count"></div>
                    </div>
                    KK1
                </div>
                <div href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div class="count"></div>
                    </div>
                    KK2
                </div>
                <div href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div class="count"></div>
                    </div>
                    KK3
                </div>
                <div href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div class="count"></div>
                    </div>
                    KK4
                </div>
                <div href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div class="count"></div>
                    </div>
                    KK5
                </div>
            </nav>
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
                        <div class="role"><?php echo $_SESSION['role']; ?></div>
                    </div>
                    <div class="title">
                        <div class="name"><?php echo $firstName ?></div>
                        <div class="sub"><?php echo $subName ?></div>
                    </div>
                </div>

                <nav class="navlinks">
                    <a href="./dashboard.php" class="link">
                        <i class="far fa-chart-bar"></i>
                        Dashboard
                    </a>
                    <a href="./users.php" class="link active">
                        <i class="fas fa-user-friends"></i>
                        Manage users
                    </a>
                </nav>
            </div>


        </section>

        <section class="content">
            <div class="cont">
                <div class="header">
                    <div class="title">Users</div>
                    <div class="actions">
                        <button data-bs-toggle="modal" data-bs-target="#newUserModal" class="btn-action" onclick="clearAddUserForm()">+ New user</button>
                    </div>
                </div>
                <div class="body">
                    <div id="usersTable"></div>
                </div>
            </div>

        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        const updateResidentNav = async x => {
            $('#resNav > .nav').each((i, nav) => {
                $(nav).removeClass('active');
            });

            loadUsers(x);

            $($('#resNav > .nav')[x]).addClass('active');
        };

        const loadTotalUsers = async () => {
            const totals = [];

            for (let x = 0; x <= 5; x++) {
                const n = await $.get('http://localhost/sites/ump-parcel/admin/getUsersCount.php?r=' + x);

                if (n === '') {
                    totals.push(0);
                } else {
                    totals.push(n);
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
    </script>

    <script>
        const matrixRegex = /^([A-Z]{2}[0-9]{5})$/;
        const phoneNumRegex = /^\+([0-9]{12})$/;

        const validateEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        };

        const userTable = new gridjs.Grid({
            columns: [{
                    name: 'Username'
                },
                {
                    name: 'Status'
                },
                {
                    name: 'Fullname'
                },
                {
                    name: 'Matric ID'
                },
                {
                    name: 'Last activity'
                },
                {
                    name: 'Actions',
                    formatter: (cell, row) => {
                        return [gridjs.h('button', {
                            className: 'btn-action btn-edit',
                            onClick: () => {
                                selectUpdateUser(row.cells[0].data);
                            }
                        }, 'Edit'), gridjs.h('button', {
                            className: 'btn-action btn-delete',
                            onClick: () => {
                                selectDeleteUser((row.cells[0].data));
                            }
                        }, 'Delete')];
                    }
                },
            ],
            data: [],
            resizable: true,
            sort: true,
            className: {
                td: 'cust-td',
                container: 'cust-cont',
                th: 'cust-th',
                table: 'cust-table',
                pagination: 'cust-pagi',
                search: 'cust-search',
                header: 'cust-header'
            },
            pagination: {
                enabled: true,
                limit: 5
            },
            search: {
                enabled: true
            }
        }).render(document.getElementById("usersTable"));

        const form = document.querySelector('#formUpdate');

        const updateForm = (username, active, firstname, lastname) => {
            form.username.value = username;
            form.active.value = active;
            form.firstname.value = firstname;
            form.lastname.value = lastname;
        };

        const clearAddUserForm = () => {
            $('#newUserForm').find('input').val('');
        };

        const createNewUser = async () => {
            $('#newUserForm .anim-icon').each((x, e) => {
                $(e).removeClass('true');
                $(e).removeClass('false');
            });


            /* validate */
            let pass = true;
            $('#newUserForm').find('input').each((x, e) => {
                pass &&= ($(e).val() != '');
            });

            if (pass) {
                let response = await $.post('./createNewUser.php', {
                    username: $('#newUserForm input[name="username"]').val(),
                    password: $('#newUserForm input[name="password"]').val(),
                    role: $('#newUserForm select[name="role"]').val()
                });

                response = JSON.parse(response);

                if (response.status !== 200) {
                    if (response.message === 'Username already exists') {
                        $('#newUserForm input[name="username"]').closest('div').find('.anim-icon').removeClass('true');
                        $('#newUserForm input[name="username"]').closest('div').find('.anim-icon').addClass('false');

                        $('#newUserForm input[name="username"]').parent().parent().find('label').addClass('active');
                        $('#newUserForm input[name="username"]').parent().parent().find('label').html(response.message);
                    }
                } else {
                    $('#newUserForm input[name="username"]').closest('div').find('.anim-icon').removeClass('false');
                    $('#newUserForm input[name="username"]').closest('div').find('.anim-icon').addClass('true');

                    $('#newUserForm input[name="username"]').parent().parent().find('label').removeClass('active');

                    $('#newUserModal').modal('toggle');

                    await swal(`Account ${$('#newUserForm input[name="username"]').val()} created successfuly!`, {
                        icon: "success",
                    });

                    window.location.reload();
                }

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
                    default: break;
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
        const selectDeleteUser = async username => {
            const confirm = await swal({
                title: `Delete ${username}?`,
                text: 'Are you sure you want to delete',
                icon: 'warning',
                buttons: true,
                dangerMode: true
            });

            if (confirm) {
                try {
                    await $.get(`./deleteUserByUsername.php?username=${username}`);
                    await swal(`Account ${username} deleted successfully!`, {
                        icon: "success",
                    });

                    window.location.reload();
                } catch (e) {}
            }
        };

        const loadUsers = async x => {
            let users = await $.get('http://localhost/sites/ump-parcel/admin/getUsers.php?r=' + x);

            /* let totalParcelsByUser = await $.getJSON('http://localhost/sites/ump-parcel/admin/getTotalParcelsByUser.php'); */

            if (users === '') {
                return userTable.updateConfig({
                    data: []
                }).forceRender();
            }

            users = JSON.parse(users);

            const data = users.map(e => {
                const status = (e.active === '0') ? 'Inactive' : 'Active';
                const date = new Date(parseInt(e.lastActive));
                return [e.username, status, `${e.firstname} ${e.lastname}`, e.matrixId, `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`, null]
            });

            userTable.updateConfig({
                data
            }).forceRender();
        };

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

        window.onload = function() {
            updateDateTime()
            setInterval(() => updateDateTime(), 1000);

            $('#resNav > .nav').each((x, nav) => {
                $(nav).on('click', () => updateResidentNav(x));
            });

            loadTotalUsers();

            updateResidentNav(0);
        };
    </script>
</body>

</html>