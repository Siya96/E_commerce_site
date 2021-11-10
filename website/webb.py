from flask import Flask
webb = Flask(__name__)
@webb.route('/')
def index():
    return 'Hello World'
if __name__ == '__main__':
    webb.run()
