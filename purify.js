const purify = require("purify-css")
var content = ['404.html', 'beyond-books-and-boundaries.html', 'curriculum.html', 'early-childhood.html', 'gems-learner-profile.html', 'global-network.html', 'middle-school.html', 'note-founder.html', 'note-principal.html', 'our-team.html', 'page-template.html', 'parent-partnership.html', 'primary-years.html', 'privacy-policy.html', 'safety-security.html', 'schools-for-good.html', 'senior-school.html', 'terms-and-conditions.html', 'university-destination.html'];

var css = ['./css/styles.css'];

var options = {
    output: './css/purified_1.css',
   
    // Will minify CSS code in addition to purify.
    minify: false,
   
    // Logs out removed selectors.
    rejected: true
  };

  purify(content, css, options);
 