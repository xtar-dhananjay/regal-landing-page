// Set the end date for the offer
const endDate = new Date('April 20, 2024 00:00:00').getTime();

// Update the countdown every second
const timerInterval = setInterval(updateTimer, 1000);

function updateTimer() {
  // Get the current time
  const now = new Date().getTime();
  
  // Calculate the time remaining
  const distance = endDate - now;
  
  // Check if the timer has expired
  if (distance < 0) {
    clearInterval(timerInterval);
    document.getElementById('timer').innerHTML = 'Offer has ended!';
    return;
  }
  
  // Calculate days, hours, minutes, and seconds
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Display the countdown
  document.getElementById('timing').innerHTML = `${days} Days : ${hours} H : ${minutes} M : ${seconds} S`;
}







// make form
let form = document.getElementById('form');
let submitBtn = document.getElementById('submitBtn');
let nameInput = document.getElementById('fullname');
let phoneInput = document.getElementById('phoneno');

let firstNameRegex = /^[a-zA-Z]+$/;
let indianPhoneNumberRegex = /^[7-9]\d{9}$/;

// Function to validate inputs
function validateInputs() {
    let firstName = nameInput.value.trim();
    let phoneNumber = phoneInput.value.trim();

    if (!firstNameRegex.test(firstName)) {
        nameInput.style.borderColor = "red";
        nameInput.focus();
        return false;
    }else{
        nameInput.style.borderColor = "lightgray";
    }

    if (!indianPhoneNumberRegex.test(phoneNumber)) {
        phoneInput.style.borderColor = "red";
        phoneInput.focus();
        return false;
    }else{
        phoneInput.style.borderColor = "lightgray";
    }

    // Inputs are valid
    return true;
}



form.onsubmit = (e) => {
    e.preventDefault();
    if (validateInputs()) {
        console.log("Inputs are valid");
        submitBtn.disabled = true;
        submitBtn.innerText = "loading...";

        let formData = new FormData(form);

        // Convert form data to JSON object
        let jsonObject = {};
        formData.forEach((value, key) => {
            jsonObject[key] = value;
        });
    
        fetch('Admin/php/insert.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonObject) 
        })
        .then(response => response.json()) // Return the promise here
        .then(data => {
            if (data.success === true) {
                form.reset();
                window.location = "thankyou.html";
                console.log(data);
            }
                
            submitBtn.innerText = "Book Now";
            submitBtn.disabled = false;
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation11:', error);
        });

    } else {
        console.log("Not valid");
    }
}