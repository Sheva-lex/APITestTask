import IMask from 'imask';

let element = document.querySelector('.mask');
let maskOptions = {
  mask: '{+38} (000) 000-00-00',
  lazy: true,
  placeholder: {
    // show: 'always',
    }
};

if (element) {
    let mask = IMask(element, maskOptions);
}
