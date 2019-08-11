pipeline {
    agent { docker { image 'circleci/php' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version && composer install --no-dev && composer show'
            }
        }

        stage('test') {
            steps {
                sh 'composer test'
            }
        }
    }
}