function wanttosell() {
    // check if the user is logged in
    if (isLoggedIn()) {
        // redirect to the sell page
        window.location.href = 'http://localhost/clgproject/want%20to%20resell/project-s1.php';
    } else {
        // redirect to the login page
        window.location.href = 'http://localhost/clgproject/loginpage/login.php';
    }
}

// Path: Homepage\main.js
function isLoggedIn() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'isLoggedIn.php', false);
    xhr.send();
    return xhr.responseText === 'true';
}

constainer.addEventListener('click', function(e) {
    if (e.target.classList.contains('wanttosell')) {
        wanttosell();
    }
});