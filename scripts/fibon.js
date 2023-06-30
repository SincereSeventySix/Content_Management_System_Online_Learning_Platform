
function validate(form)
      {
        fail  = validateFirstname(form.firstname.value);
        fail += validateLastname(form.lastname.value);
        fail += validateEmail(form.email.value);
        fail += validateStudentname(form.studentname.value);
        fail += validateAge(form.studentage.value);
        fail += validateGender(form.student_gen.value);
        fail += validateCurYear(form.curyear.value); 
        fail += validateEngLev(form.english_lev.value);
        fail += validateUsername(form.username.value);
        fail += validatePassword(form.password1.value, form.password2.value); 
        
        if   (fail == "")   return true
        else { alert(fail); return false }
      }

      function validateFirstname(field)
      {
        return (field == "") ? "No Firstname was entered.\n" : "";
      }
      
      function validateLastname(field)
      {
        return (field == "") ? "No Surname was entered.\n" : "";
      }

      function validateEmail(field)
      {
        if (field == "") return "No Email was entered.\n";
          else if (!((field.indexOf(".") > 0) &&
                     (field.indexOf("@") > 0)) ||
                     /[^a-zA-Z0-9.@_-]/.test(field))
            return "The Email address is invalid.\n";
        return "";
      }

      function validateStudentname(field)
      {
        return (field == "") ? "No student name was entered.\n" : "";
      }

      function validateAge(field)
      {
        if (isNaN(field)) return "No Age was entered.\\n";
        else if (field < 3 || field > 18)
          return "Age must be between 3 and 18.\n";
        return "";
      }
      
      function validateGender(field)
      {
        if (field == "")
        {
          return "No student gender was entered.\n";
        }
          else if (field == "m" || field == "M" || field == "f" || field == "F")
        {
          return "";
        }
          else if (field !== "m" || field !== "M" || field !== "f" || field !== "F")
        {
          return field + " is not valid, please enter 'M' or 'F'\n";
        }
      }

      function validateCurYear(field) 
      {
        return (field == "") ? "Your child's school year is empty.\n" : "";
      }

      function validateEngLev(field)
      {
        return (field == "") ? "No English level was entered.\n" : "";
      }

      function validateUsername(field)
      {
        if (field == "") return "No Username was entered.\n";
        else if (field.length < 5)
          return "Usernames must be at least 5 characters.\n";
        else if (/[^a-zA-Z0-9_-]/.test(field))
          return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n";
        return "";
      }

      function validatePassword(field1, field2)
      {
        if (field1 !== field2) return "Passwords do not match";
        if (field1 == "") return "No Password was entered.\n";
        else if (field1.length < 6)
        return "Passwords must be at least 6 characters.\n";
        else if (! /[a-z]/.test(field1) ||
           ! /[A-Z]/.test(field1) ||
           ! /[0-9]/.test(field1))
        return "Passwords require one of character: a-z, A-Z and 0-9.\n";
        return ""
     }


     function validate2(form)
      {
        fail += validateTest(form.testVal.value);
        if   (fail == "")   return true
        else { alert(fail); return false }
      }

      function validateTest(field)
      {
        return (field == "") ? "You did not take the test.\n" : "";
      }
     
     

