$(document).ready(function() {
    $('#update_profile_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'profile.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response == 'success') {
                    alert('Profile updated successfully!');
                } else {
                    alert('Error updating profile!');
                }
            }
        });
    });
});
