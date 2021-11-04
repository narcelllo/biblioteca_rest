function validation() {
    console.log("ok");
    fetch('http://localhost:3333/users')
        .then(function (response) {
            return response.json();
        })
        .then(validation => {
            el = validation;
            if (el === 200) {

                let status = ""

                status = "<h2>" + "Cadastrado com sucessso" + "</h2>"

                var statusAdd = document.getElementById("status");
                statusAdd.innerHTML = status;
               
            }

        });
}