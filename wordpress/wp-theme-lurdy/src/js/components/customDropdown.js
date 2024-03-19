import $ from 'jquery';

const customDropdown = () => {
  const selectedOption = $('.selected-option');
  const dropdownList = $('.dropdown-list');
  const originalSelect = $('.original-select');
  const customDropdown = $('.js-custom-dropdown ');

  selectedOption.on('click', function() {
    dropdownList.slideToggle();
    customDropdown.toggleClass('is-active');
  });

  dropdownList.on('click', 'p', function() {
    const $this = $(this);
    const selectedValue = $this.data('value');
    const selectedText = $this.text();

    selectedOption.text(selectedText);
    originalSelect.val(selectedValue);
    originalSelect.trigger('change');
    dropdownList.slideUp();
    customDropdown.toggleClass('is-active').addClass('has-selected');
  });

  $(document).on('click', function(event) {
    if (!customDropdown.is(event.target) && customDropdown.has(event.target).length === 0) {
      dropdownList.slideUp();
      if(customDropdown.hasClass('is-active')){
        customDropdown.removeClass('is-active');
      }
    }
  });
};

export default customDropdown;