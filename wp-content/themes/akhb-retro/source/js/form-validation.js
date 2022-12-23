const form = document.querySelector('#myForm');

const firstname = document.querySelector('#firstname');
const lastname = document.querySelector('#lastname');
const email = document.querySelector('#email');

const formField = input.parentElement;

const error = formField.querySelector('small');



//following this tutorial:
//https://www.javascripttutorial.net/javascript-dom/javascript-form-validation/



const isRequired = value => value === '' ? false : true;

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};


// 👇️ if you can't add an `id` to the form
// const form = document.querySelector('form');



form.addEventListener('submit', (error) => {

    // Prevent the form button from submitting again, before fixing the issues
    error.preventDefault(); 
    
})