module.exports = function (grunt) {
	// Force use of Unix newlines
	grunt.util.linefeed = "\n";
  
	grunt.initConfig({
	  pkg: grunt.file.readJSON("package.json"),
  
	  sass: {
		dist: {
		  options: {
			style: "expanded"
		  },
		  files: {
			"assets/dist/css/bootstrap.5.0.0.css": "assets/dev/scss/bootstrap/bootstrap.scss"
		  }
		}
	  },
  
	  postcss: {
		options: {
		  map: false, // inline sourcemaps
  
		  processors: [
			require("autoprefixer")(), // add vendor prefixes
			require("cssnano")() // minify the result
		  ]
		},
		dist: {
		  src: "assets/dist/css/bootstrap.5.0.0.css",
		  dest: 'assets/dist/css/bootstrap.5.0.0.min.css'
		}
	  },
  
	  watch: {
		scripts: {
		  files: ["assets/dev/scss/**/*.scss", "assets/dev/es6/**/*.js"],
		  tasks: ["sass", "babel", "eslint:build"],
		  options: {
			interrupt: true,
			spawn: false
		  }
		}
	  },
  
	  concat: {
		dev: {
		  src: [
			'assets/dist/js/bootstrap.bundle.min.js',
			'assets/dist/js/custom.js'
		  ],
		  dest: 'assets/dist/js/main.js'
		}
	  },
  
	  eslint: {
		build: {
		  options: {
			configFile: 'assets/dev/es6/eslint.json'
		  },
		  src: ['assets/dist/js/custom.js']
		},
	  },
  
	  babel: {
		options: {
		  sourceMap: false,
		  presets: ['@babel/preset-env']
		},
		dist: {
		  files: {
			"assets/dist/js/custom.js": "assets/dev/es6/custom.js",
			"assets/dist/js/spu-calendar.js": "assets/dev/es6/spu-calendar.js"
		  }
		}
	  },
  
	  uglify: {
		main: {
		  files: {
			"assets/dist/js/custom.min.js": "assets/dist/js/custom.js"
		  }
		}
	  },
  
	  htmllint: {
		all: ["*.html"]
	  }
	  
	});
  
	grunt.registerTask("dev", ["sass", "babel", "eslint:build", "htmllint"]);
	grunt.registerTask("build", ["sass", "babel", "eslint:build", "postcss", "htmllint", "uglify"]);
  
	grunt.loadNpmTasks("grunt-contrib-sass");
	grunt.loadNpmTasks("grunt-postcss");
	grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks("grunt-contrib-watch");
	grunt.loadNpmTasks("grunt-contrib-concat");
	grunt.loadNpmTasks("grunt-babel");
	grunt.loadNpmTasks("grunt-eslint");
	grunt.loadNpmTasks("grunt-html");
  };
  