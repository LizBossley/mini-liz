module.exports = function(grunt) {

  // 1. All configuration goes here
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // JavaScript
     babel: { //necessary to run foundation
      options: {
        sourceMap: true,
        presets: ['es2015']
      },
      dist: {
        src: [
          'bower_components/foundation-sites/js/foundation-components-concat.js',
          ],
          dest: 'bower_components/foundation-sites/js/foundation-components.js',
      }
    },
    concat: {
      // 2. Configuration for concatenating files goes here.
      dist: {
        src: [
          'bower_components/featherlight/release/featherlight.min.js',
          'bower_components/bxslider-4/dist/jquery.bxslider.js',
          'bower_components/foundation-sites/js/foundation-components.js',
          'js/vendors/*.js', // All JS in the libs folder
          'js/lib/*.js', // All JS in the libs folder
          'js/main.js'  // This specific file
        ],
        dest: 'js/production.js',
        sourceMap: true
      },
      dist2: { //concatenate the necessary foundation files so they can be processed with babel
        src: [
          'bower_components/foundation-sites/js/foundation.core.js',
          'bower_components/foundation-sites/js/foundation.util.mediaQuery.js',
          'bower_components/foundation-sites/js/foundation.util.keyboard.js', 
          'bower_components/foundation-sites/js/foundation.util.motion.js',
          'bower_components/foundation-sites/js/foundation.util.timerAndImageLoader.js', 
          'bower_components/foundation-sites/js/foundation.accordion.js',
          'bower_components/foundation-sites/js/foundation.equalizer.js',
        ],
        dest: 'bower_components/foundation-sites/js/foundation-components-concat.js',
        sourceMap: true
      }
    },
    uglify: {
      build: {
        src: 'js/production.js',
        dest: 'js/production.min.js',
        sourceMap: true
      }
    },
    // Style
    copy: {
      getSCSSFromCSS: {
      files: [
        {
        expand: true,
        // add you css files here!!!
        // Then remember to include the copied file in style.scss
        src: [
          'bower_components/featherlight/release/featherlight.min.css',
          'bower_components/bxslider-4/dist/jquery.bxslider.min.css'
        ],
        dest: 'sass/',
        rename: function(dest, src) {
          src = src.split('/').pop();
          // turn the src into just the file name instead of the full path to the source
          return dest + '_unique_' + src.replace(/\.css$/, ".scss");
        }
        }
      ]
      }
    },
    sass: {
      dist: {
        files: {
          '.tmp/style.css': 'sass/style.scss'
        }
      },
      options: {
        sourceMap: true,
        outputStyle: 'nested',
        imagePath: "../img"
      }
    },
    autoprefixer: {
      dist: {
        files: {
          'style.css': '.tmp/style.css'
        },
        options: {
          map: true
        }
      }
    },

    // Grunticon
    grunticon: {
      myIcons: {
        files: [{
          expand: true,
          cwd: 'images/icons/svgs',
          src: ['*.svg', '*.png'],
          dest: 'images/icons/output'
        }],
        options: {
          loadersnippet: 'grunticon.loader.js',
          enhanceSVG: true,
          corsEmbed: true,
          pngfolder: 'png/',
          pngpath: '../images/icons/output/png',
          defaultWidth: '100px',
          template: 'images/icons/svgCssTemplate.hbs'
        }
      }
    },

    watch: {
      icons: {
        files: ['images/**/*.svg'],
        tasks: ['grunticon:myIcons'],
        options: {
          spawn: false,
        }
      },
      css: {
        files: ['sass/*.scss'],
        tasks: ['sass', 'autoprefixer'],
        options: {
          spawn: false,
        }
      },
      scripts: {
        files: ['js/*.js'],
        tasks: ['concat', 'uglify'],
        options: {
          spawn: false,
        },
      }
    },

    browserSync: {
      dev: {
        bsFiles: {
          src : [
            'style.css',
            '*.php',
            'js/main.js',
            'js/**/*.js',
          ]
        },
        options: {
          watchTask: true,
          proxy: 'www.ml.dev',
          port: '8888'
        }
      }
    }

  });

  // 3. Where we tell Grunt we plan to use this plug-in.
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-grunticon');

  // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  grunt.registerTask('default', ['concat:dist2', 'babel', 'concat:dist', 'uglify', 'copy:getSCSSFromCSS', 'sass', 'autoprefixer', 'grunticon:myIcons', 'browserSync', 'watch']);
};