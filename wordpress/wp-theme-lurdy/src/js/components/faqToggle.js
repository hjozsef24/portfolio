import $ from 'jquery'

const faqToggle = () => {
    const faqCardContent = $(".js-faq-card").children('.js-faq-card-body');
    const faqCardHeader = $(".js-faq-card-header");
    const chevron = $(".js-faq-card-chevron");
    
    faqCardHeader.on("click", function () {
      const currentfaqCardContent = $(this).parent().children('.js-faq-card-body');
      const currentChevron = $(this).children('.js-faq-card-chevron');

      currentfaqCardContent.slideToggle();
      currentChevron.toggleClass('expanded')
      
      faqCardContent.not(currentfaqCardContent).slideUp()
      chevron.not(currentChevron).removeClass('expanded');
    });
}

export default faqToggle;