// const button = document.getElementById('btn');
// const resultSection = document.getElementById('result');
// const freightOption = document.getElementById('freightOption');
// const unitPrice=3.40;
// const handlingCharge=15.0;
// const stateValues = {
//   "Lagos": 10,
//   "Ogun": 20,
//   "Oyo": 30,
//   "Osun": 40,
//   "Benin": 10,
// };

// const radioButtons = document.querySelectorAll('input[type="radio"][name="radioGroup2"]');
// for (const radioButton of radioButtons) {
//   radioButton.addEventListener('change', (event) => {
//     const selectedOption = event.target.value;
//     freightOption.textContent = selectedOption === 'air' ? 'Air freight' : 'Ocean freight';
//   });
// }

// function CalculateFare(){
//   const height= parseInt(document.getElementById('height').value);
//   const weight= parseInt(document.getElementById('weight').value);
//   const result= document.getElementById('output');
//     const weightFigure = document.getElementById('weightFigure');
//     const unitprice= document.getElementById('unitprice');
//     const handlingcharge= document.getElementById('handlingcharge');
//     const chargeableweight= document.getElementById('chargeableweight');
//     const selectedState = document.querySelector('.states').value; 

    
//      const selectedOption = document.querySelector('input[type="radio"][name="radioGroup2"]:checked').value;

//   let height_status=false, weight_status=false;
   
//   if(height === '' || isNaN(height) || (height<= 0)){
//     document.getElementById('height_error').innerHTML ='please provide a valid height'
//   }else{
//       document.getElementById('height_error').innerHTML=''; 
//       height_status=true;
//   }
   
//   if(weight === '' || isNaN(weight) || (weight<= 0)){
//     document.getElementById('weight_error').innerHTML ='please provide a valid weight'
//   }else{
//       document.getElementById('weight_error').innerHTML=''; 
//       weight_status=true;
//   }
//   if (height_status && weight_status){
//       const stateValue = stateValues[selectedState] || 0;
//          const bmi = (weight * unitPrice) + stateValue;
//       weightFigure.innerHTML = weight + ' kg';
//       chargeableweight.innerHTML = weight + ' kg';
//       unitprice.innerHTML ='£' + unitPrice;
//       handlingcharge.innerHTML = '£' + handlingCharge;
//       freightOption.textContent = selectedOption === 'air' ? 'Air freight' : 'Ocean freight';

//     output.innerHTML = '£' + bmi;

//     resultSection.style.display = 'block';
//   } else {
//     alert("The form has errors");
//     weightFigure.innerHTML = '';
//     chargeableweight.innerHTML="";
//     unitprice.innerHTML = '';
//     handlingcharge.innerHTML="";
//     output.innerHTML = '';
//     resultSection.style.display = 'none';
//   }
// }

       
        const firstDropdown = document.getElementById("firstDropdown");
        const secondDropdown = document.getElementById("secondDropdown");
        const popupText = document.getElementById("popupText");
        const btn = document.getElementById("btn");
        const weightInput = document.getElementById("weight");
        const heightInput = document.getElementById("height");
        const widthInput = document.getElementById("width");
        const lengthInput = document.getElementById("length");
        const selectInputs = document.querySelectorAll(".hide-s");
        



      

        function handleFormElementsVisibility() {
            const selectedCountry1 = firstDropdown.value;
            const selectedCountry2 = secondDropdown.value;

            if (selectedCountry1 === "Nigeria" && selectedCountry2 === "Europe") {
                // Hide the form elements
                // weightInput.style.display = "none";
                // heightInput.style.display = "none";
                // widthInput.style.display = "none";
                // lengthInput.style.display = "none";
               
               selectInputs.forEach(input => {
            input.style.display = "none";
        });
               
            } else {
                // Show the form elements
                // weightInput.style.display = "block";
                // heightInput.style.display = "block";
                // widthInput.style.display = "block";
                // lengthInput.style.display = "block";
                selectInputs.forEach(input => {
            input.style.display = "block";
        });
            }
        }
         

        // Attach a listener to the dropdown change event
        firstDropdown.addEventListener("change", handleFormElementsVisibility);
        secondDropdown.addEventListener("change", handleFormElementsVisibility);


// btn.addEventListener("click", function() {
//     const selectedCountry1 = firstDropdown.value;
//     const selectedCountry2 = secondDropdown.value;

//     if (selectedCountry1 === "Nigeria" && selectedCountry2 === "Europe") {
//         showPopupText()
//          resultSection.style.display = 'none';
//           popupText.style.display = "block";
//     } else {
//         CalculateFare();
//          resultSection.style.display = 'block';
//           popupText.style.display = "none";
//     }
// });
