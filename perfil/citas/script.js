document.addEventListener('DOMContentLoaded', function() {
    const startTimeInput = document.getElementById('start-time');
    const endTimeInput = document.getElementById('end-time');

    startTimeInput.addEventListener('change', function() {
        endTimeInput.min = this.value;
        if (endTimeInput.value < this.value) {
            endTimeInput.value = this.value;
        }
    });
});