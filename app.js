document.getElementById('calorie-form').addEventListener('submit', function (e) {
    document.getElementById('results').style.display = 'none';
    //document.getElementById('loading').style.display = 'block';
    setTimeout(calculateCalories, 100);
    e.preventDefault();
});


function calculateCalories(e) {
    const age = document.getElementById('age');
    const gender = document.getElementById('gender').value;
    const weight = document.getElementById('weight');
    const height = document.getElementById('height');
    const activity = document.getElementById('activity').value;
    const totalCalories = document.getElementById('total-calories');
    const lowestCalories = document.getElementById('lowestCalories');


    if (age.value === '' || weight.value === '' || height.value === '' || age.value > 80 || age.value < 15) {
        errorMessage('Please enter the correct values!')
    } else if (gender === 'male' && activity === 'sedentary') {
        totalCalories.value = Math.round(1.2 * (66 + (6.3 * parseFloat(weight.value)) + (12.9 * parseFloat(height.value)) - (6.8 * parseFloat(age.value))));
    } else if (gender === 'male' && activity === 'light') {
        totalCalories.value = Math.round(1.375 * (66 + (6.3 * parseFloat(weight.value)) + (12.9 * parseFloat(height.value)) - (6.8 * parseFloat(age.value))));
    } else if (gender === 'male' && activity === 'moderate') {
        totalCalories.value = Math.round(1.55 * (66 + (6.3 * parseFloat(weight.value)) + (12.9 * parseFloat(height.value)) - (6.8 * parseFloat(age.value))));
    } else if (gender === 'male' && activity === 'hard') {
        totalCalories.value = Math.round(1.725 * (66 + (6.3 * parseFloat(weight.value)) + (12.9 * parseFloat(height.value)) - (6.8 * parseFloat(age.value))));
    } else if (gender === 'male' && activity === 'extra_hard') {
        totalCalories.value = Math.round(1.9 * (66 + (6.3 * parseFloat(weight.value)) + (12.9 * parseFloat(height.value)) - (6.8 * parseFloat(age.value))));
    } else if (gender === 'female' && activity === 'sedentary') {
        totalCalories.value = Math.round(1.2 * (665 + (4.3 * parseFloat(weight.value)) + (4.7 * parseFloat(height.value)) - (4.7 * parseFloat(age.value))));
    } else if (gender === 'female' && activity === 'light') {
        totalCalories.value = Math.round(1.375 * (665 + (4.3 * parseFloat(weight.value)) + (4.7 * parseFloat(height.value)) - (4.7 * parseFloat(age.value))));
    } else if (gender === 'female' && activity === 'moderate') {
        totalCalories.value = Math.round(1.55 * (665 + (4.3 * parseFloat(weight.value)) + (4.7 * parseFloat(height.value)) - (4.7 * parseFloat(age.value))));
    } else if (gender === 'female' && activity === 'hard') {
        totalCalories.value = Math.round(1.725 * (665 + (4.3 * parseFloat(weight.value)) + (4.7 * parseFloat(height.value)) - (4.7 * parseFloat(age.value))));
    } else if (gender === 'female' && activity === 'extra_hard') {
        totalCalories.value = Math.round(1.9 * (665 + (4.3 * parseFloat(weight.value)) + (4.7 * parseFloat(height.value)) - (4.7 * parseFloat(age.value))));
    }

    //totalCalories.value;
    lowestCalories.value = totalCalories.value - 500;
    document.getElementById('results').style.display = 'flex';


}

function errorMessage(error) {
    document.getElementById('results').style.display = 'none';

    const errorDiv = document.createElement('div');
    const card = document.querySelector('.card');
    const heading = document.querySelector('.heading');
    errorDiv.className = 'alert alert-danger';
    errorDiv.appendChild(document.createTextNode(error));

    card.insertBefore(errorDiv, heading);

    setTimeout(clearError, 4000);
}
function clearError() {
    document.querySelector('.alert').remove();
}
