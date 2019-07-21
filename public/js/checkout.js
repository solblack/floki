
window.addEventListener("load", function() {

        var nameChecked = false;
        var last_nameChecked = false;
        var emailChecked = false;
        var address1Checked = false;
        // var address2Checked = false;
        var cityChecked = false;
        var zipcodeChecked = false;
        var stateChecked = false;
        var countryChecked = false;

        function validateName(){
            var att = document.createAttribute("placeholder");
            var nameinput = document.querySelector(".name");
            var name = $(".name").val();
            if (!name) {
                nameinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                nameinput.setAttributeNode(att);
            } else if (name.length < 3) {
                nameinput.value = "";
                nameinput.classList.add("is-invalid");
                att.value = "El campo debe tener al menos 3 letras";
                nameinput.setAttributeNode(att);
            }else{
                nameChecked = true;
                nameinput.classList.remove("is-invalid");
            }
        }

        function validateLastName(){
            var att = document.createAttribute("placeholder");
            var last_nameinput = document.querySelector(".last_name");
            var last_name = $(".last_name").val();
            if (!last_name) {
                last_nameinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                last_nameinput.setAttributeNode(att);
            } else if (last_name.length < 3) {
                last_nameinput.value = "";
                last_nameinput.classList.add("is-invalid");
                att.value = "El campo debe tener al menos 3 letras";
                last_nameinput.setAttributeNode(att);
            }else {
                last_nameChecked = true;
                last_nameinput.classList.remove("is-invalid");
            }
        }

        function validateEmail(){
            var att = document.createAttribute("placeholder");
            var emailinput = document.querySelector(".email");
            var email = $(".email").val();
            if (!email) {
                emailinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                emailinput.setAttributeNode(att);
            }else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
                emailinput.value = "";
                emailinput.classList.add("is-invalid");
                att.value = "El campo email debe tener el formato ejemplo@mail.com";
                emailinput.setAttributeNode(att);
            } else {
                emailChecked = true;
                emailinput.classList.remove("is-invalid");
            }
        }

        function validateAddress1(){
            var att = document.createAttribute("placeholder");
            var address1input = document.querySelector(".address1");
            var address1 = $(".address1").val();
            if (!address1) {
                address1input.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                address1input.setAttributeNode(att);
            } else if (address1.length < 3) {
                address1input.value = "";
                address1input.classList.add("is-invalid");
                att.value = "El campo debe tener al menos 3 letras";
                address1input.setAttributeNode(att);
            } else {
                address1Checked = true;
                address1input.classList.remove("is-invalid");
            }
        }

        // function validateAddress2(){
        //     var att = document.createAttribute("placeholder");
        //     var address2input = document.querySelector(".address2");
        //     var address2 = $(".address2").val();
        //     if (!address2) {
        //         address2input.classList.add("is-invalid");
        //         att.value = "Debe completar este campo";
        //         address2input.setAttributeNode(att);
        //     } else if (address2.length < 3) {
        //         address2input.value = "";
        //         address2input.classList.add("is-invalid");
        //         att.value = "El campo debe tener al menos 3 letras";
        //         address2input.setAttributeNode(att);
        //     }else{
        //         address2Checked = true;
        //         address2input.classList.remove("is-invalid");
        //     }
        // }

        function validateCity(){
            var att = document.createAttribute("placeholder");
            var cityinput = document.querySelector(".city");
            var city = $(".city").val();
            if (!city) {
                cityinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                cityinput.setAttributeNode(att);
            } else if (city.length < 3) {
                cityinput.value = "";
                cityinput.classList.add("is-invalid");
                att.value = "El campo debe tener al menos 3 letras";
                cityinput.setAttributeNode(att);
            }else{
                cityChecked = true;
                cityinput.classList.remove("is-invalid");
            }
        }

        function validateZipcode(){
            var att = document.createAttribute("placeholder");
            var zipcodeinput = document.querySelector(".zipcode");
            var zipcode = $(".zipcode").val();
            if (!zipcode) {
                zipcodeinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                zipcodeinput.setAttributeNode(att);
            } else if (isNaN(zipcode)) {
                zipcodeinput.value = "";
                zipcodeinput.classList.add("is-invalid");
                att.value = "El campo debe ser un número";
                zipcodeinput.setAttributeNode(att);
            }else{
                zipcodeChecked = true;
                zipcodeinput.classList.remove("is-invalid");
            }

        }

        function validateState(){
            var att = document.createAttribute("placeholder");
            var stateinput = document.querySelector(".state");
            var state = $(".state").val();
            if (!state) {
                stateinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                stateinput.setAttributeNode(att);
            } else if (state.length < 3) {
                stateinput.value = "";
                stateinput.classList.add("is-invalid");
                att.value = "El campo debe tener al menos 3 letras";
                stateinput.setAttributeNode(att);
            }else{
                stateChecked = true;
                stateinput.classList.remove("is-invalid");
            }
        }


        function validateCountry(){
            var att = document.createAttribute("placeholder");
            var countryinput = document.querySelector(".country");
            var country = $(".country").val();
            if (!country) {
                countryinput.classList.add("is-invalid");
                att.value = "Debe completar este campo";
                countryinput.setAttributeNode(att);
            } else if (country.length < 3) {
                countryinput.value = "";
                countryinput.classList.add("is-invalid");
                att.value = "El campo debe tener al menos 3 letras";
                countryinput.setAttributeNode(att);
            }else{
                countryChecked = true;
                countryinput.classList.remove("is-invalid");
            }
        }
        $(".name").blur(function() {
            validateName();
        });

        $(".last_name").blur(function() {
            validateLastName();
        });

        $(".email").blur(function() {
            validateEmail();
        });

        $(".address1").blur(function() {
            validateAddress1();
        });

        // $(".address2").blur(function() {
        //     validateAddress2();
        // });

        $(".city").blur(function() {
            validateCity();
        });

        $(".zipcode").blur(function() {
            validateZipcode();
        });

        $(".state").blur(function() {
            validateState();
        });

        $(".country").blur(function() {
            validateCountry();
        });


        $('form').submit(function(e){

            e.preventDefault()

              validateName();
              validateLastName();
              validateEmail();
              validateAddress1();
              // validateAddress2();
              validateCity();
              validateZipcode();
              validateState();
              validateCountry();


            if(nameChecked && last_nameChecked && emailChecked && address1Checked && cityChecked && zipcodeChecked && stateChecked && countryChecked){


                this.submit();
            }
        })



});
