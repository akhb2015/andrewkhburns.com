const form = document.querySelector('#myForm');
// To display the error message
const errorDiv = document.querySelector('.form-error.firstname');
// To validate the term
const term = document.querySelector('#term');

const firstname = document.querySelector('#firstname');


// 👇️ if you can't add an `id` to the form
// const form = document.querySelector('form');

Array.from(form.elements).forEach(element => {
  console.log(element);
  
});


form.addEventListener('submit', (error) => {
// All validation checks are run in this method.
    let incorrectInput = '';

    if(firstname.value === '') {
        incorrectInput = 'Please enter your first name.\n';
    }

    if (incorrectInput !== "") {
        // Change the error div tag to display the error message(s)
        //document.getElementsByName('term')[0].placeholder = incorrectInput;
        errorDiv.innerText = incorrectInput; 
        // Change the color of the text to red
        errorDiv.style.color = 'blue'; 
        // Prevent the form button from submitting again, before fixing the issues
        error.preventDefault(); 
    } 
})