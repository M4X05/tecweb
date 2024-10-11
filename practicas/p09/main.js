function validateForm(event) {
    var nameField = document.getElementById('form-name');
    var nameValue = nameField.value.trim();
    var modelField = document.getElementById('form-mod');
    var modelValue = modelField.value.trim();
    var modelPattern = /^[a-zA-Z0-9]+$/;
  
    if (nameValue === "") {
      alert("El campo 'Nombre' es obligatorio.");
      event.preventDefault(); 
      return false;
    }
  
    if (nameValue.length > 100) {
      alert("El campo 'Nombre' no debe exceder los 100 caracteres.");
      event.preventDefault(); 
      return false;
    }

    if (modelValue === "") {
      alert("El campo 'Modelo' es obligatorio.");
      event.preventDefault(); 
      return false;
    }
  
    if (modelValue.length > 25) {
      alert("El campo 'Modelo' no debe exceder los 25 caracteres.");
      event.preventDefault(); 
      return false;
    }
  
    if (!modelPattern.test(modelValue)) {
      alert("El campo 'Modelo' solo debe contener caracteres alfanuméricos.");
      event.preventDefault();
      return false;
    }
  
    return true;
  }
  
  window.onload = function() {
    document.getElementById('formularioTenis').addEventListener('submit', validateForm);
  };
  