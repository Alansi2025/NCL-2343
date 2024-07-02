// script.js
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('salary-form');
    
    form.addEventListener('submit', function(event) {
        const empid = document.getElementById('empid').value;
        const password = document.getElementById('emppassword').value;
        
        if (!validateForm(empid, password)) {
            event.preventDefault();
            alert('Please fill out all fields correctly.');
        }
    });
    
    function validateForm(empid, password) {
        if (empid.trim() === '' || password.trim() === '') {
            return false;
        }
        return true;
    }
});
