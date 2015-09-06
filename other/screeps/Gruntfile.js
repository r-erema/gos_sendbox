module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-screeps');

    grunt.initConfig({
        screeps: {
            options: {
                email: 'eratut@mail.ru',
                password: 's88gutSOut11S',
                branch: 'default'
            },
            dist: {
                src: ['dist/*.js']
            }
        }
    });
}