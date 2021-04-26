const content=document.querySelectorAll('.prod-content');
if (content){
    content.forEach(el=>{
        if(el.textContent.length>=100){
            el.textContent=`${el.textContent.substr(0,100)}...`;
        }
    })
    // content.textContent=`${content.textContent.substr(0,100)}...`;
}
(function () {
    'use strict'
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    }, false)
}())

