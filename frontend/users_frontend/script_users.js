
let users = {};
let books = {};

fetch('http://localhost:3333/users')
    .then(function (response) {
        return response.json();
    })
    .then(usersCollection => {
        users = usersCollection;
        usersf(users);
    });
    

/* fetch('http://localhost:3333/books')
    .then(function (response) {
        return response.json();
    })
    .then(usersCollection => {
        books = usersCollection;
    });
 */
function usersf(users) {

    let elUsers = ""

    users.forEach(el => {
        elUsers += "<tr><td>" + el.id + "</td>"
        elUsers += "<td>" + el.name + "</td>"
        elUsers += "<td>" + el.birth_date + "</td>"
        elUsers += "<td>" + el.cpf + "</td>"
        elUsers += "<td>" + el.email + "</td>"
        elUsers += "</tr>"
    }); 
    var tableUsers = document.getElementById("table_users");
        tableUsers.innerHTML = elUsers;
}

    
   /*      let elUsers = ""
        for (var i = 0; i < users.length; i++) {
           elUsers += "<tr><td>" + users[i].id + "</td>"
           elUsers += "<td>" + users[i].name + "</td>"
           elUsers += "<td>" + users[i].birth_date + "</td>"
           elUsers += "<td>" + users[i].cpf + "</td>"
           elUsers += "<td>" + users[i].email + "</td>"
           elUsers += "</tr>"
        }
        var tableUsers = document.getElementById("table");
        tableUsers.innerHTML = elUsers;
    } */