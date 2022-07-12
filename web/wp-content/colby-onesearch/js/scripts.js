'use strict';

var $ = void 0;
var DID_YOU_MEAN_FILLED = false;
var FACET_COUNTS_RECEIVED = false;
var PARAMS = void 0;
var RESULTS = [];
var SEARCH_TYPES = ['books', 'musicscores', 'journalarticles', 'journals', 'audio', 'video', 'libguides', 'libanswers', 'databases', 'digitalcommons', 'images'];

/**
 * @summary Get the value of a URL parameter.
 *
 * @param string sParam The key to look for.
 *
 * @return string The value, or an empty string if not found.
 */
var getURLParameter = function getURLParameter(sParam) {
  var sPageURL = window.location.search.substring(1);
  var sURLVariables = sPageURL.split('&');
  for (var i = 0; i < sURLVariables.length; i += 1) {
    var sParameterName = sURLVariables[i].split('=');
    if (sParam === sParameterName[0]) {
      return sParameterName[1];
    }
  }
  return '';
};

/**
 * @summary Get entire URL parameter string.
 *
 * @param string url The current page URL.
 */
var getURLParamString = function getURLParamString(url) {
  if (url == null) {
    url = window.location.href;
  }
  var parameter_start = url.indexOf('?');
  return url.substring(parameter_start + 1);
};

/**
 * @summary Activate toggler for advanced search options.
 */
var advancedToggler = function advancedToggler() {
  $('.advanced-toggler').click(function () {
    undefined.toggleClass('active');
    $('.advanced-options').toggleClass('active');
  });
};

/**
 * @summary Run a fallback search if too few boxes are showing after other searches complete.
 */
var doFallback = function doFallback(first_empty_box, results_showing) {
  try {
    $.get(ajaxurl, PARAMS + '&box=fallback', function (data) {
      var html = JSON.parse(data).html;
      for (var i = 0; i < html.length; i += 1) {
        if (i + first_empty_box > SEARCH_TYPES.length) {
          break;
        }
        $('#bento-box-' + (i + first_empty_box)).show();
        $('#bento-box-' + (i + first_empty_box)).append(html[i]);
        results_showing += 1;
      }
      if (!results_showing) {
        $('.bento-column').prepend('<div class="bento-no-results">No results.</div>');
        $('.facet-counts-container').hide();
      }
      $('.bento-cover').removeClass('active');
    });
  } catch (e) {
    $('.bento-cover').removeClass('active');
  }
};

/**
 * @summary Fill the did-you-mean div.
 */
var drawDidYouMean = function drawDidYouMean(result) {
  if (!result) {
    return;
  }

  if (DID_YOU_MEAN_FILLED) {
    return;
  }

  if (!result.did_you_mean) {
    return;
  }

  var old_search_string = getURLParamString();
  var old_q = getURLParameter('q');
  var new_search_string = old_search_string.replace(old_q, result.did_you_mean);

  var text = 'Did you mean ';
  text += '<a href="?' + new_search_string + '">';
  text += result.did_you_mean;
  text += '</a>?';

  var didYouMeanInner = document.createElement('div'); // create message block div
  var didYouMeanHeading = '<h3>Result Not Found</h3>'; // create heading for message block
  didYouMeanInner.setAttribute('class', 'did-you-mean'); // add CSS class to message block
  didYouMeanInner.innerHTML = didYouMeanHeading + text; // inject heading and link

  $('#did-you-mean').append(didYouMeanInner);
  DID_YOU_MEAN_FILLED = true;
};

/**
 * @summary Handle results after receiving them.
 */
var gotResults = function gotResults() {
  RESULTS = processResultsJSON();
  var results_showing = 0;
  var first_empty_box = void 0;
  for (var i = 0; i < SEARCH_TYPES.length; i += 1) {
    if (!RESULTS[i]) {
      continue;
    }

    drawDidYouMean(RESULTS[i]);

    if (RESULTS[i].facet_counts) {
      $('.facet-counts-container').append(RESULTS[i].facet_counts);
    }

    if (RESULTS[i].html.indexOf('bento-result__title') === -1) {
      $('#bento-box-' + i).hide();
      if (!first_empty_box) {
        first_empty_box = i;
      }
    } else {
      $('#bento-box-' + i).append(RESULTS[i].html);
      results_showing += 1;
    }
  }

  if (results_showing < 3) {
    doFallback(first_empty_box, results_showing);
  } else {
    $('.bento-cover').removeClass('active');
  }
};

/**
 * @summary Parse JSON into an array of objects
 */
var processResultsJSON = function processResultsJSON() {
  var objects = [];
  for (var i = 0; i < RESULTS.length; i += 1) {
    objects.push(JSON.parse(RESULTS[i]));
  }
  return sortByScore(objects);
};

/**
 * @summary Get results and put them in data array.
 *
 * @param string resource The search to run.
 * @param string parameters The URL parameter string.
 */
var runAjax = function runAjax(resource, parameters) {
  var params_with_box_type = parameters + '&box=' + resource;

  if (FACET_COUNTS_RECEIVED === false) {
    params_with_box_type += '&get_facet_counts=1';
    FACET_COUNTS_RECEIVED = true;
  }

  try {
    $.get(ajaxurl, params_with_box_type, function (data) {
      RESULTS.push(data);
    }).fail(function () {});
  } catch (e) {
    // Do nothing.
  }
};

/**
 * @summary Sort results by score, highest to lowest.
 *
 * @param array objects The array of objects to sort.
 * @param array output The sorted list.
 *
 * @return array output The sorted list.
 */
var sortByScore = function sortByScore(objects, output) {
  if (objects.length === 0) {
    return output;
  }

  if (output == null) {
    output = [];
  }

  var highest_score = 0;
  var index_of_highest_score = void 0;
  for (var i = 0; i < objects.length; i += 1) {
    if (highest_score <= objects[i].score) {
      highest_score = objects[i].score;
      index_of_highest_score = i;
    }
  }
  output.push(objects.splice(index_of_highest_score, 1)[0]);

  return sortByScore(objects, output);
};

/**
 * @summary Run interval until results are recieved.
 *
 * @param function callback The function to run when results are recieved.
 */
var waitForResults = function waitForResults(callback) {
  var counter = 0;
  var this_interval = setInterval(function () {
    counter += 1;
    if (counter > 75 || SEARCH_TYPES.length === RESULTS.length) {
      clearInterval(this_interval);
      callback();
    }
  }, 200);
};

/**
 * @summary Uncheck boxes browser automatically checks.
 */
var uncheckCheckboxes = function uncheckCheckboxes() {
  if (getURLParameter('online') === '') {
    $('input[name="online"]').removeAttr('checked');
  }
  if (getURLParameter('scholarly') === '') {
    $('input[name="scholarly"]').removeAttr('checked');
  }
};

jQuery(document).ready(function (jquery) {
  $ = jquery;

  $('.bento-cover__logo').addClass('fadeout');

  advancedToggler();
  uncheckCheckboxes();

  PARAMS = getURLParamString() + '&action=bentoAjaxRequest';
  for (var i = 0; i < SEARCH_TYPES.length; i += 1) {
    runAjax(SEARCH_TYPES[i], PARAMS);
  }

  waitForResults(gotResults);
});