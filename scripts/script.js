function changeOptions(selectEl) {
    let selectedValue = selectEl.options[selectEl.selectedIndex].value;
    let subForms = document.getElementsByClassName('className');

    let inputd = document.getElementsByClassName('dvd');

    console.log(input);
    
    for (let i = 0; i < subForms.length; i += 1) {
        selectedValue === subForms[i].id 
        ? subForms[i].setAttribute('style', 'display:block')
        : subForms[i].setAttribute('style', 'display:none') 
    }
  }