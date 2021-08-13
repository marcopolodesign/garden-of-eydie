console.log('start travel!');
let pageName = document.querySelector('[data-barba=container]');
let preLoad = document.querySelectorAll('.pre-load');
let header = document.querySelector('header')

let docuHeight = document.body.clientHeight;
let color;
let anchors;
let buttons;
let allAnchors;

const runScripts = () => {
  pageName = document.querySelector('[data-barba=container]');
  console.log(pageName);
  docuHeight = document.body.clientHeight;



  const headerColor = () => {
      let hasBackground = document.querySelector('#main.no-mt');

        if (!hasBackground) {
            header.classList.add('bg-white')
            console.log('no-bg')

        } else {
          header.classList.remove('bg-white')
          console.log('has-bg')
        }

        document.addEventListener('scroll' , () => {
          header.classList.add('bg-white');
        })

  }

  const animateSVG = (willAnimate) => {
    anime({
      targets: willAnimate,
      strokeDashoffset: [anime.setDashoffset, 0],
      easing: 'easeInOutSine',
      duration: 800,
      delay: function (el, i) {
        return i * 100;
      },
      direction: 'alternate',
      loop: false,
    });
  };

  const animatePath = (willAnimate, path) => {
    var path = anime.path(path);

    var easings = ['linear', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic'];

    var motionPath = anime({
      targets: willAnimate,
      translateX: path('x'),
      translateY: path('y'),
      rotate: path('angle'),
      easing: function (el, i) {
        // return easings[i];
        return 'easeInOutSine';
      },
      duration: 1500,
      // loop: true,
    });
  };

  const faq = () => {
    const faq = document.querySelectorAll('.faq-item');
    let categories = document.querySelectorAll('.faq-category');

  
      faq.forEach(q => {
        let isExpanded = q.getAttribute('area-expanded');
        q.addEventListener('click', (e)=> {
          console.log(isExpanded)
          let answer = q.querySelector('.faq-answer');
          let arrow = q.querySelector('svg');
  
          let height = answer.querySelector('p').clientHeight ;   
          console.log(height)

          let faq = gsap.timeline({
            defaults: {
              easing: Expo.EaseOut,
              duration: 0.2,
            },
          })
  
          if (!isExpanded) {
            faq
            // .to(arrow, {transform: 'rotate(-90deg)'})
            .to (answer, { opacity: 0})
            .to (answer, {maxHeight: "0", opacity: 0}, 0.15)
              console.log('reverse')
              isExpanded = true;  
          } else {
            faq
            // .to(arrow, {transform: 'rotate(0deg)'})
            .to (answer, {maxHeight: height})
            .to (answer, { opacity: 1}, 0.3)
            isExpanded = false;  
          }          
        })
      })
  

    const filters = document.querySelectorAll('.faq-filter h2');

    // Filter cat on click
    filters.forEach((filter) => {
      let cat = filter.getAttribute('id');

      filter.addEventListener('click', () => {
        categories.forEach((q) => {
          let faqCat = q.getAttribute('faq-cat');
          q.style.display = 'none';
          if (faqCat === cat) {
            q.style.display = '';
          } else if (cat === 'View All') {
            q.style.display = '';
          } else {
            q.style.display = 'none';
          }
        });
      });
    });
  };


  function googleAnalytics() {
    gtag('event', 'page_view', {
      page_location: 'https://art.mirandabosch.com',
      page_path: window.location.pathname,
      send_to: 'G-409NEZJV2Y',
    })
  }

  const fbTrack = () => {
    fbq('track', 'PageView');
  }


  const initScripts = () => {
    if (pageName.classList.contains('home')) {
      // postAnimations();
    }

    let hasFaq = document.querySelector('.faq-container');

    if (hasFaq) {
      faq();
    }

    // bgColor();

  };

  headerColor();
  // postAnimations();
  initScripts();
  // fbTrack();
  // googleAnalytics();
  // allCursor();

  // changeFooter();
};

const moreAnchors = () => {
  let cursor = document.querySelector('.cursor');
  let newAnchors = Array.prototype.slice.call(document.querySelectorAll('.anchors'));
  let newA = Array.prototype.slice.call(document.querySelectorAll('a'));
  anchors = allAnchors.concat(newAnchors);
  anchors = allAnchors.concat(newA);

  // const hoverCursor = () => {
  //   console.log('move!');
  //   cursor.classList.add('is-hover');
  // };

  // const removeHoverCursor = () => {
  //   cursor.classList.remove('is-hover');
  //   cursor.classList.remove('is-shop');
  //   cursor.classList.remove('add-cart');
  // };

  // anchors.forEach((anchor) => {
  //   anchor.addEventListener('mouseover', () => {
  //     if (anchor.classList.contains('is-shoppable')) {
  //       cursor.classList.add('is-shop');
  //     } else if (anchor.classList.contains('single_add_to_cart_button')) {
  //       cursor.classList.add('add-cart');
  //     } else {
  //       hoverCursor();
  //     }
  //   });
  // });

  // anchors.forEach((anchor) => {
  //   anchor.addEventListener('mouseleave', () => {
  //     removeHoverCursor();
  //   });
  // });
};

const logo = () => {
  document.addEventListener('scroll', () => {
    let logo = document.querySelector('.logo');

    const currentScroll = window.pageYOffset;
    // logo.style.transform = 'rotate(' + window.pageYOffset / 4 + 'deg)';
  });
};

const lifestyle = () => {
  let holders = document.querySelectorAll('.lifestyle-cat');
  let typeHolder = document.querySelector('.lifestyle-cover h1');

  holders.forEach(cat=> {
    console.log(cat)
      cat.addEventListener('mouseenter',  () => {
        const catTl = gsap.timeline({
          defaults : {
             ease: 'Expo.easeOut',
          duration: 0.5,
          }
        })

        catTl.to (holders, {opacity: ".2", },0)
        .to(cat, {opacity: "1"}, 0)
        .to(typeHolder, {opacity: 0, y: "20px"}, 0)
        .call(()=> {
          typeHolder.innerHTML = cat.getAttribute('cat-name');
          if (typeHolder.innerHTML.length > 10) {typeHolder.classList.add('small-font');} else {typeHolder.classList.remove('small-font')}
        })
        .to(typeHolder, {zIndex: 2, color: 'black'}, 0,3)
        .to (typeHolder, {opacity: 1, y: 0} )
      })

      
      cat.addEventListener('mouseleave', ()=> {

        const catLeave = gsap.timeline({
          defaults : {
             ease: 'Expo.easeOut',
          duration: 0.5,
          }
        })

        catLeave.to (holders, {opacity: 1},0)
        .to(typeHolder, {opacity: 0, y: "20px"}, 0)
        .call(()=> {
          typeHolder.innerHTML = 'Lifestyle';
          typeHolder.classList.remove('small-font')
        })
        .to(typeHolder, {zIndex: -1, color: ''}, 0,1)
        .to (typeHolder, {opacity: 1, y: 0})
      })

  })
}

const instagram = () => {
  let fields = 'id,username, media_type, media_url, timestamp, permalink, comments'

  const accessToken = 'IGQVJYRUV6SVFpazJpNHlBS3QxaEZAFcExLNTVTRXRuWTEyeFZANLXpVQ1NmSDQ5LWpzMGNXbWlnVUdDVFUzS1FzNmZAfbHVJUF8teGc0QlNkZAXVmQVdVZAUs1WGNvYTZAENHFGNWt0RzdVdWZAqckxZAb0pWYgZDZD';


  const superHiApi = `https://api.superhi.com/api/test/token/instagram?access_token=${accessToken}`


  const sectionTag = document.querySelector('.instagram-feed');
  let newToken;

  const refreshToken = () => {
    return fetch (superHiApi)
    .then((response)=> response.json())
    .then((token)=> {
     return token.access_token
    }
   ); 
  }
  refreshToken();

  const getGram = async () => {
    newToken = await refreshToken()

  const apiUrl = `https://graph.instagram.com/me/media?fields=${fields}&access_token=${newToken}`;

  
  return fetch(apiUrl, {
    count: 5
  })
    .then((response) => response.json())
    .then((data) => {
      sectionTag.innerHTML = '';
       data.data.slice(0, 5).forEach((post) => {
          sectionTag.innerHTML =
            sectionTag.innerHTML +
            `<div class="flex flex-column">
                <a class="relative w-100" target="_blank" href="${post.permalink}">
                  <div class='absolute-cover cover no-repeat bg-center' style='background-image: url("${post.media_url}")'></div>
                </a>
                <div class="justify-between ig-aob pa3 dn">
                  <div class="flex items-center">
                    <img src="/wp-content/uploads/2020/02/heart-ig-icon.svg">
                    <p class="ml2">${''}</p>
                  </div>
                  <div class="flex items-center">
                    <img src="/wp-content/uploads/2020/02/comments-ig-icon.svg"><p class="ml2">${''}</p>
                  </div>
                </div>
              </div>
          `;
        });
    
      setTimeout(() => {
        let width = document.querySelector('.instagram-feed div a').clientWidth;
        document.querySelectorAll('.instagram-feed div a').forEach((post) => {
          post.style.height = width + 'px';
        });
      }, 1000);
      window.addEventListener('resize', () => {
        width = document.querySelector('.instagram-feed div a').clientWidth;
        console.log(width);
        document.querySelectorAll('.instagram-feed div a').forEach((post) => {
          post.style.height = width + 'px';
        });
      });
    });
  }
  getGram()
};

instagram();


const carrousel = () => {
  let slider = document.querySelector('.marco-carrousel > div');
  let controllers = Array.prototype.slice.call(document.querySelectorAll('.dot'));

  controllers.forEach((c,i) => {
    c.addEventListener('click', ()=> {
      slider.style.transitionDelay = "0s !important"
      controllers.forEach(c => {
        c.classList.remove('active')
      });
      c.classList.add('active');
     if (i < 0) {
       slider.style.left = "80vw"
     } else {
       slider.style.left = i * -86 + "vw";
     }
    })
  })
}

const scrollTo = (array, target) => {
  let n;
  if (array.length > 0) {
    array.forEach((i) => {
      i.addEventListener('click', (e) => {
        n = array.indexOf(e.target);

        console.log(target[n].offsetTop)
        window.scrollTo({
          top: target[n].getBoundingClientRect().top + window.scrollY - 150,
          behavior: 'smooth',
        });
      });
    });
  }
};



barba.init({
  timeout: 5000,
  prevent: ({ el }) => el.classList.contains('barba-prevent'),
  transitions: [
    {
      leave({ current, next, trigger }) {
        // closeMenu();

        return new Promise((resolve) => {
          const timeline = gsap.timeline({
            defaults: {
              ease: Expo.easeOut,
            },
            onComplete() {
              current.container.remove();
              resolve();
            },
          });
          timeline
            .call(() => {
              preLoad[0].classList.add('animate');
            })
            .set(preLoad, { x: '100%', opacity: '1' })
            .to(current.container, { opacity: 0.6, x: '-10%', duration: 2 }, 0)
            .to(preLoad[0], { x: '0%', ease: Power4.easeOut, duration: 1.5 }, 0);
        });
      },
      enter({ current, next, trigger }) {
        return new Promise((resolve) => {
          window.scrollTo({
            top: 0,
          });
          runScripts();
          const timeline = gsap.timeline({
            onComplete() {
              resolve();
            },
            defaults: {
              duration: 2,
              ease: Expo.easeOut,
            },
          });

          timeline
            .call(() => {
              preLoad[0].classList.remove('animate');
            })
            .set(next.container, { opacity: 0, x: '10%' })
            .to(preLoad, { x: '-100%', opacity: 1, duration: 2.3 }, 0)
            .to(next.container, { opacity: 1, x: '0' }, 0.5);
        });
      },  
    },

  ],
  views: [
    {
      namespace: 'home',
      afterEnter(data) {

      },
    },

    {
      namespace: 'recipes', 
      afterEnter (data) {
        carrousel();
      }
    },  {
      namespace: 'recipe', 
      afterEnter(data) {
        let index = Array.prototype.slice.call(document.querySelectorAll('.recipe-index h2'));
        let sections = Array.prototype.slice.call(document.querySelectorAll('.recipe-section .mission h1'));
        scrollTo(index, sections);
      }
    },
    {
      namespace: 'lifestyle', 
      afterEnter (data) {
        lifestyle();
      }
    }

  ],
  debug: true,
});

runScripts();



// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});




