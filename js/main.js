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
  // console.log(pageName);
  docuHeight = document.body.clientHeight;



  const animatePosts = () => {

    let posts = document.querySelectorAll('.recommended-content li');

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.intersectionRatio >= 0.13) {
            entry.target.classList.add('in-view');
          }
        });
      },
      {
        threshold: [0, 0.2, 1],
      }
    );

    posts.forEach((post) => {
      observer.observe(post);
    });
  }


const isRecipePage = () => {
  let recipePage = window.location.pathname === '/category/recipe/';

  if (isRecipePage) {
    document.querySelector('.sub-categories-list').innerHTML = `<h2>Plant based recipes you'll love that will elevate your well being</h2>`


    let select = document.querySelector('.recipe-select');

    select.remove(0);
    // let recipeOption = new Option('Select Recipe','Select Recipe');
    // select.prepend(recipeOption);
      }
}



  animatePosts();

  const headerColor = () => {
      let hasBackground = document.querySelector('#main.no-mt');

        if (!hasBackground) {
            header.classList.add('bg-white')

        } else {
          header.classList.remove('bg-white')
        }

        document.addEventListener('scroll' , () => {
          header.classList.add('bg-white');
          header.classList.add('scrolled')
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
          let answerContent = answer.querySelector('p');
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
            .to (answerContent, {marginTop: '0px', marginBottom: "0px"}, 0)
            .to (answer, {maxHeight: "0", opacity: 0}, 0.15)
          
              console.log('reverse')
              isExpanded = true;  
          } else {
            faq
            // .to(arrow, {transform: 'rotate(0deg)'})
            .to (answer, {maxHeight: height})
            .to (answer, { opacity: 1}, 0.3)
            .to (answerContent, {marginTop: '10px', marginBottom: "10px"}, 0.3)
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
  isRecipePage();
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

  const accessToken = 'IGQVJVV2haaUV3dHJLV3FEVXRIa2VTRTZAVMWtpblp5RnlmLTFLam1KX1dQQ01raUw2a251QVprSWJybmw4b3d0b2taMG0zUzZAIZA0puOXVjaUFzaEpmWk1ydFB3b2I0VU4wang5THNMaVBqLTZA6cUhubAZDZD';


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
        if (post.media_type === "VIDEO") {
          sectionTag.innerHTML =
          sectionTag.innerHTML +
          `<div class="flex flex-column">
            <a rel="noreferrer noopener" class="relative w-100" target="_blank" href="${post.permalink}">
            <video preload="true" autoplay="true" muted="true" loop="true" src="${post.media_url}"></video>
            </a>
          </div>`;
        } else { 
          sectionTag.innerHTML =
            sectionTag.innerHTML +
            `<div class="flex flex-column">
                <a class="relative w-100" target="_blank" href="${post.permalink}">
              <div class='absolute-cover cover no-repeat bg-center' style='background-image: url("${post.media_url}")'></div>
              </a>
            </div>
          `;
        }
        });
    
      setTimeout(() => {
        let width = document.querySelector('.instagram-feed div a').clientWidth;
        document.querySelectorAll('.instagram-feed div a').forEach((post) => {
          post.style.height = width + 'px';
        });

        document.querySelectorAll('.instagram-feed div video').forEach((post) => {
          post.style.height = width + 'px';
        });
        
      }, 1000);
      window.addEventListener('resize', () => {
        width = document.querySelector('.instagram-feed div a').clientWidth;
        console.log(width);
        document.querySelectorAll('.instagram-feed div a').forEach((post) => {
          post.style.height = width + 'px';
        });

        document.querySelectorAll('.instagram-feed div video').forEach((post) => {
          post.style.height = width + 'px';
        });

      });
    });
  }
  getGram()
};

instagram();

const search = () => {
  let searchContainer = document.querySelector('.search-menu-container')
  let searchTrigger = document.querySelector('.search-trigger');
  let closeSearch = document.querySelector('.close-search');
  let searchBar = document.querySelector('.search-menu-bar');

  let searchTL = gsap.timeline({
    paused: true, 
    defaults: { 
      easing: Power4.easeInOut, 
      duration: .3,
    },
  });
  searchTL
  .to(searchBar, {y: 0})
  .to(closeSearch, {opacity: .9}, .2)

  searchTrigger.addEventListener('click', ()=> {
    searchTL.play();
    searchContainer.classList.remove('pointers-none');
  }) 

  closeSearch.addEventListener('click', ()=> {
    searchTL.reverse();
    searchContainer.classList.add('pointers-none');

  })
}

search();

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
       slider.style.left = "85vw"
     } else {
       slider.style.left = i * -85 + "vw";
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

let menu = document.querySelector('.menu-container')
let menuContent = document.querySelector('#side-menu');
let linkContainer = document.querySelectorAll('ul.menu-nav > li')
let menuLinks = document.querySelectorAll('ul.menu-nav > li > a')
let menuBg = menu.querySelector('.absolute-cover.bg-main-color')


let delay = 8;
let duration = .4
let transition = Power4.easeInOut;


let menuTL = gsap.timeline({
  paused: true
});
menuTL
.to (menuBg, {scale: 1, force3D: false, duration: duration , transition: transition}).to(menuLinks, {y: 0, stagger: 0.05}, .2)
.to(linkContainer, {y: 0, stagger: 0.05}, .4)


const openMenu = () => {
  let trigger = document.querySelector('.menu-trigger');
  trigger.addEventListener('click', ()=> {
    menu.classList.remove('o-0');
    menu.classList.remove('pointers-none');

    menuTL.play();

  })

  let subMenuTrigger = document.querySelector('.slide-sub-menu > a');
  let subMenu = document.querySelector('.slide-sub-menu ul')
  let background = document.querySelector('.sub-menu-bg');

  subMenuTrigger.addEventListener('mouseover', ()=> {
    background.classList.add('active');
  })

  subMenu.addEventListener('mouseleave', ()=> {
    background.classList.remove('active');
  })

 
}


const closeMenu = () => {
  let trigger = document.querySelector('.close-menu');

  trigger.addEventListener('click', ()=> {
    menuTL.reverse();
    setTimeout(() => {
      menu.classList.add('o-0');
      menu.classList.add('pointers-none');
    }, 1200);
   
  })
}

closeMenu();
openMenu();

const moveSlides = () => {
  let slides = document.querySelectorAll('.home-slider .slide');
  let text = gsap.utils.toArray('.slide-text');
  let slideImage = gsap.utils.toArray('.slide-img');
  let slideColor = gsap.utils.toArray('.s-bg-color');
  let background = gsap.utils.toArray('.s-bg-img>div');
  const controllers = gsap.utils.toArray('.slider-controller span span');

  let cta = gsap.utils.toArray('.slide-text');


  let delay = 8;
  let duration = .6
  let transition = Power4.easeInOut;


  let animateFirstSlide = () => {
    let header = document.querySelector('header')

    // CustomEase.create("cubic", "0.77, 0, 0.175, 1")

    generalTl = gsap.timeline({ 
      defaults: {
        ease: Power4.easeInOut,
          duration: .8
      }
  
    }) 

    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) { 
      generalTl
      .set(header, {y: '-100%'})
      .set(cta[0], {PointerEvent: 'all', duration: 0},)
      .set(slideImage[0], {opacity: 1,y: "150%"})
      .call(()=> {
        slideColor[0].classList.add('is-open');
        background[0].classList.add('is-open');
      })
      .to (header, {y :0, duration: 0.6, delay: .3, ease: Power2.easeOut})
      .to(text[0], {opacity: 1,}, 0.3)  
      .to(slideImage[0], {opacity: 1, transform: 'translate(-36%, -50%'}, .9)
    }  else {
      generalTl
      .set(header, {y: '-100%'})
      .set(cta[0], {pointerEvents: 'all', duration: 0})
      .set(slideImage[0], {opacity: 1,y: "150%"})
      .call(()=> {
        slideColor[0].classList.add('is-open');
        background[0].classList.add('is-open');
      })
      .to (header, {y :0, duration: 0.6, delay: .3, ease: Power2.easeOut})
      .to(text[0], {opacity: 1,}, 0.3)  
      .to(slideImage[0], {opacity: 1, transform: 'translate(-50%, 0%)'}, .9)
    
    }

    
  }

  animateFirstSlide();

  const TextTL = gsap.timeline({ repeat: -1});
  const ctaTL = gsap.timeline({repeat: -1});
  const imageTL = gsap.timeline({ repeat: -1});
  const colorTL = gsap.timeline({ repeat: -1});
  const backgroundTL = gsap.timeline({ repeat: -1});
  const controllersTL = gsap.timeline ({repeat: -1})


  const animateSlides = () => {
    text.forEach((c, i) => {
      TextTL
      .to(c, { opacity: 1, duration: duration, ease: transition })
      .to(c, { opacity: 0, duration: duration, delay: delay})
    });

    cta.forEach((c, i) => {
      ctaTL
      .to(c, {pointerEvents: 'all', duration: duration})
      .to(c, { duration: duration , delay: delay })

    })

    slideImage.forEach((c, i) => {
      if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) { 
      imageTL
      .set(c, { opacity: 1, transform: "translate(-36%, 150%)"})
      .to(c, { opacity: 1,  transform: "translate(-36%, -50%)", duration: duration, ease: transition })
      .to(c, { opacity: 1,  transform: "translate(-36%, -250%)", duration: duration, delay: delay }) } 
      else {
        imageTL
        .set(c, { opacity: 1, transform: "translate(-130%, 0%)"})
        .to(c, { opacity: 1,  transform: "translate(-50%, 0%)", duration: duration, ease: transition })
        .to(c, { opacity: 1,  transform: "translate(136%, 0%)", duration: duration, delay: delay })  
      }
    });
  
  
    slideColor.forEach((c, i) => {
      colorTL
      .to(c, { opacity: 1, duration: duration, ease: transition })
      .to(c, { duration: duration , delay: delay })
    });

    background.forEach((c, i) => {
      backgroundTL
      .set (c, {clipPath: "inset(0px 0px 0px 100%)"})
      .to(c, { clipPath: "inset(0)", duration: duration, ease: transition })
      .to(c, { duration: duration, delay: delay })
    });

    controllers.forEach((c, i)=> {
        controllersTL
          .set ( c, {width: "0%", scaleY: "100%"})
          .to (c, {width: "100%", duration: (duration + delay), ease: Power0.easeNone})
          .to ( c, {scaleY: "0%", duration: duration, ease: transition})

    })


  const resetSlides = () => {
    dots.forEach(d=> {
        d.style.backgroundColor = "#000"
    });

    boxes.forEach(b => {
        b.style.zIndex = "1";
    })

    wallpapers.forEach((w,i) => {
        // w.style.zIndex = "1"

       if (
        //    i == activeSlide -1 ||
         i == activeSlide ) {
           w.style.clipPath = 'inset(100% 0 0 0)'
       } else {
        //    w.style.zIndex = '0'
       }
    })
  }

  }

  const sliderText = () => {
    let text = document.querySelectorAll('.slide-text h1');

    text.forEach(t => {
      let count = t.innerText.length

      if (count > 30) {
		   if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) { 
        t.style.fontSize = "4rem" } else {
			t.style.fontSize = '2.5rem';
		}
      } else if (count > 45) {
		   if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) { 
        t.style.fontSize = "3rem"
		   } else {
			  t.style.fontSize = '2rem'; 
		   }
      }

    })
  }

  sliderText();
  animateSlides();

  const toSlide = () => {
    let indicators = document.querySelectorAll('.slider-controller > span');


    indicators.forEach((n,index) => {
      n.addEventListener('click', () =>{
      
      indicators.forEach(i => {
        i.querySelector('span').classList.add('not-active')
      })
      n.querySelector('span').style.width = "100% !important"
      n.querySelector('span').classList.remove('not-active')

        TextTL.pause()
        ctaTL.pause()
        imageTL.pause() 
        colorTL.pause() 
        backgroundTL.pause() 
        controllersTL.pause();

        let activeTimeline = gsap.timeline();
        duration = "1"
       
        activeTimeline
        .to(text, { opacity: 0, duration: duration, ease: transition },0)

        .to(text[index], { opacity: 1, duration: duration, ease: transition },0)
     
        .to(cta, {pointerEvents: 'none', duration: duration},0)

        .to(cta[index], {pointerEvents: 'all', duration: duration},0)

        .to(slideColor, { opacity: 0, duration: duration, ease: transition },0)
        .to(slideColor[index], { opacity: 1, duration: duration, ease: transition },0)
    
     
        .to(background, {clipPath: "inset(0px 0px 0px 100%)"},0)
        .to(background[index], { clipPath: "inset(0)", duration: duration, ease: transition },0)
      

        // .set ( controllers, {width: "0%", scaleY: "100%"},0)
        // .to (controllers[index], {width: "100%", duration: (duration + delay), ease: Power0.easeNone},0)
     
   
  
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) { 
        activeTimeline
        .to(slideImage, { opacity: 0, zIndex: 0, transform: "translate(-36%, 150%)"},0)
        .to(slideImage[index], { opacity: 1,  zIndex: 5, transform: "translate(-36%, -50%)", duration: duration, ease: transition },0)
        } else {
          activeTimeline
          .to(slideImage, { opacity: 0, zIndex: 0, transform: "translate(-130%, 0%)"},0)
          .to(slideImage[index], { opacity: 1, zIndex: 5, transform: "translate(-50%, 0%)", duration: duration, ease: transition },0)
        }
      })
    })
  }
  

  

  toSlide();
}

const recipeDropdown = () => {
  let dropdown = document.querySelector('.recipe-select');

  dropdown.addEventListener('change', (e)=> {
    window.location = e.target.value;
  })
}





barba.init({
  timeout: 5000,
  prevent: ({ el }) => el.classList.contains('barba-prevent'),
  transitions: [
    {
      leave({ current, next, trigger }) {
        menuTL.reverse();
        setTimeout(() => {
          menu.classList.add('o-0');
          menu.classList.add('pointers-none');
        }, 1200);

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
        moveSlides();
      },
    },

    {
      namespace: 'recipes', 
      afterEnter (data) {
        // carrousel();
        recipeDropdown();
      }
    },  {
      namespace: 'recipe', 
      afterEnter(data) {
        let index = Array.prototype.slice.call(document.querySelectorAll('.recipe-index h2'));
        let sections = Array.prototype.slice.call(document.querySelectorAll('.recipe-content .mission h1'));
        scrollTo(index, sections);
      }
    },
    {
      namespace: 'lifestyle', 
      afterEnter (data) {
        lifestyle();
      }
    },
    {
      namespace: 'archive',
      afterEnter(data){ 
        recipeDropdown();
      },
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



