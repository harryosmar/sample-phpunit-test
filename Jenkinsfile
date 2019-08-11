pipeline {
    agent { docker { image 'circleci/php' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version && pwd && composer install && composer show'
            }
        }

        stage('test') {
            steps {
                sh 'composer test'
            }
        }
    }
}