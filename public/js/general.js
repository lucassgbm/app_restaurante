const myForm = document.getElementById("form_cadastro");

myForm.addEventListener('submit', function(e) {

    e.preventDefault();

    const formData = new FormData(this);

    //const url = 'http://localhost:8000/produtos/';
    const resp = fetch('http://localhost:8000/produtos', {
        method: 'POST',
        body: formData,
        mode: 'no-cors',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector("[name='csrf-token']").content
        }
    }).then(function (response) {
        console.log(response.text());
    }).then(function (text) {
        console.log(text);
    }).catch(function (error) {
        console.log(error);
    })
});