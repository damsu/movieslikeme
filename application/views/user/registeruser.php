<h2>Register</h2>

<FORM action="<?php echo site_url('user/registeruser');?>" method="POST" id="registration" data-toggle="validator" role="form">

<div style="width:100%; max-width: 400px;">
<div class="form-group has-feedback">
  <label for="usr">Username:</label>
  <input type="text" name="username" class="form-control input-sm btn-default">
</div>

<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" name="password" class="form-control input-sm btn-default">
</div>

<div class="form-group">
  <label for="pwd">Password Confirmation:</label>
  <input type="password" name="passconf" class="form-control input-sm btn-default">
</div>

<div class="row">
  <div class="form-group col-sm-4">
    <label for="year_select">Year :</label>
    <select class="form-control selectpicker" id="year_select" name="year">
      <?php
        for ($x = 2017; $x >= 1900; $x--) {
          echo '<option value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
  <div class="form-group col-sm-4">
    <label for="month_select">Month :</label>
    <select class="form-control selectpicker" id="month_select" name="month">
      <?php
        for ($x = 1; $x <= 12; $x++) {
          echo '<option style="align" value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
  <div class="form-group col-sm-4">
    <label for="day_select">Day :</label>
    <select class="form-control selectpicker" id="day_select" name="day">
      <?php
        for ($x = 1; $x <= 31; $x++) {
          echo '<option value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
</div>

<div class="form-group">
  <label for="year_select">Gender :</label>
  <select class="form-control selectpicker" id="gender_select" name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
</div>

<div class="form-group">
  <label for="year_select">Country :</label>
  <select class="form-control selectpicker" data-live-search="true" data-dropup-auto="false" data-size="5" id="country_select" name="country">
    <?php
        $countries_array = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];

        foreach ($countries_array as $country) {
          echo '<option value="'.$country.'">'.$country.'</option>';
        }
    ?>
  </select>
</div>
<div class="form-group">
  <label for="year_select">My preferences : </label>
  <select class="selectpicker" multiple title="Movie I like" data-selected-text-format="count" name="preferences[]">
    <?php
        $genres_array = ["Action","Adventure","Animation","Biography","Comedy","Crime","Documentary","Drama","Family","Fantasy","Film-noir","History","Horror","Music","Musical","Mystery","Romance","Sci-fi","Sport","Thriller","War","Western"];

        foreach ($genres_array as $genre) {
          echo '<option value="'.$genre.'">'.$genre.'</option>';
        }
    ?>
  </select>
  <p class="help-block">Select one or more.</p>
</div>
<input type="submit" name="btnRegister" value="Register" class="btn btn-success"/>
</div>



</FORM>
<script>
$(document).ready(function() {
    $('#registration').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The Username is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required and cannot be empty'
                    }
                }
            },
            preferences: {
                validators: {
                    notEmpty: {
                        message: 'Preferences is required and cannot be empty'
                    }
                }
            },
            passconf: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required and cannot be empty'
                    },
                    identical: {
                            field: 'password',
                            message: 'The password and its confirm must be the same'
                    }
                }
            }
        }
    })
    // Enable the password/confirm password validators if the password is not empty
        .on('keyup', '[name="password"]', function() {
            var isEmpty = $(this).val() == '';
            $('#registration')
                    .formValidation('enableFieldValidators', 'password', !isEmpty)
                    .formValidation('enableFieldValidators', 'passconf', !isEmpty);

            // Revalidate the field when user start typing in the password field
            if ($(this).val().length == 1) {
                $('#enableForm').formValidation('validateField', 'password')
                                .formValidation('validateField', 'passconf');
            }
        });
  });
    </script>