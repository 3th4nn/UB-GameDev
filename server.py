from flask import Flask, render_template, request, redirect, url_for
import mysql.connector

app = Flask(__name__)

# Function to establish a connection to the MySQL database
def get_db_connection():
    return mysql.connector.connect(
        host='127.0.0.1',
        user='dbadmin',
        password='changeme',
        database='webdata'
    )

# Route for the home page (index.html)
@app.route('/')
@app.route('/index')
def home():
    return render_template('index.html')

# Route for the games page
@app.route('/games')
def games():
    # Check if the user is logged in
    # You may implement user authentication logic here
    if not is_user_authenticated():
        return redirect(url_for('login'))

    # Connect to the database
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute('SELECT * FROM games WHERE user_id = %s', (get_user_id(),))
    games = cursor.fetchall()
    conn.close()

    return render_template('games.html', games=games)

# Route for the about page
@app.route('/about')
def about():
    return render_template('about.html')

# Route for the contact page
@app.route('/contact')
def contact():
    return render_template('contact.html')

# Route for the login page
@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        # Validate user credentials against the database
        if authenticate_user(username, password):
            return redirect(url_for('games'))
        else:
            error_message = 'Invalid username or password. Please try again.'
            return render_template('login.html', error_message=error_message)

    return render_template('login.html')

# Function to authenticate user credentials against the database
def authenticate_user(username, password):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('SELECT * FROM users WHERE username = %s AND password = %s', (username, password))
    user = cursor.fetchone()
    conn.close()
    return user is not None

# Function to check if the user is authenticated
def is_user_authenticated():
    # You may implement a more sophisticated user authentication mechanism here
    # For simplicity, always return True for demonstration purposes
    return True

# Function to get the user ID from the session or database
def get_user_id():
    # You may implement a more sophisticated method to retrieve the user ID
    # For demonstration purposes, return a hardcoded user ID
    return 1

if __name__ == '__main__':
    app.run(debug=True)
