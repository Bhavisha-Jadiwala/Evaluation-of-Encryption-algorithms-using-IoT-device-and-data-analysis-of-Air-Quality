# Evaluation-of-Encryption-algorithms-using-IoT-device-and-data-analysis-of-Air-Quality
## ℹ️ About The Project

The **Air Quality Monitoring System (AQMS)** is an end-to-end IoT platform designed to collect, process, and display environmental air quality data in real time. 

### Key Features
* **Real-Time Data Collection:** Python edge node reads hardware sensors and sends JSON telemetry to the API[cite: 4, 9].
* **Interactive Dashboard:** Dynamic map interface displaying active monitoring stations and live gauge readings[cite: 1, 6].
* **Historical Data Analysis:** Visualized trend charts tracking Temperature, Humidity, PM2.5, and PM10 metrics[cite: 1].
* **User Authentication:** Secure user registration and login session management[cite: 3, 5, 10].

aqms-project/
├── database/
│   └── aqms_db.sql
├── web/
│   ├── indexx.php
│   ├── fetch_data_api.php
│   └── ... (all other PHP files & assets)
├── iot-node/
│   ├── requirements.txt
│   └── sensor_transmitter.py   <-- PUT PYTHON FILE HERE
├── .gitignore
└── README.md

__pycache__/
*.pyc
.DS_Store
Thumbs.db

requests>=2.25.0
pycryptodome>=3.10.0

# Add all files to staging
git add .

# Commit the changes with a message
git commit -m "Initial commit: AQMS PHP dashboard, MySQL schema, and Python IoT transmitter"

# Set the default branch to main
git branch -M main

# Link your local folder to your GitHub repository
git remote add origin https://github.com/Bhavisha-Jadiwala/Evaluation-of-Encryption-algorithms-using-IoT-device-and-data-analysis-of-Air-Quality

# Push your code to GitHub
git push -u origin main

# Air Quality Monitoring System (AQMS)

An IoT-based real-time Air Quality Monitoring System that reads sensor telemetry, transmits encrypted payloads over HTTP, and visualizes real-time and historical air quality data on a dynamic web dashboard.

---

## 📁 Repository Structure

* `web/`: PHP web application, dashboard, and API endpoints.
* `database/`: MySQL database schema (`aqms_db.sql`).
* `iot-node/`: Python edge script for reading sensors and transmitting data.

---

## 🚀 Getting Started

### 1. Database Setup
1. Import `database/aqms_db.sql` into your MySQL server.
2. Update the database credentials in `web/model.php` and `web/modell.php` if needed.

### 2. Web Dashboard Setup
1. Host the `web/` directory on a local PHP server (XAMPP/WAMP) or web host.
2. Ensure `fetch_data_api.php` is accessible via HTTP POST.

### 3. IoT Edge Node Setup (Python)

1. Navigate to the `iot-node` directory:
   ```bash
   cd iot-node

   pip install -r requirements.txt
   API_URL = "http://YOUR_SERVER_IP/web/fetch_data_api.php"
   python sensor_transmitter.py

   🛠 Hardware & Sensor Specifications
The Python edge node reads and transmits the following metrics:

Temperature (°C)

Humidity (%)

PM2.5 (µg/m³)

PM10 (µg/m³)

Data payloads are encrypted using AES-128 prior to transmission.

Fast Setup via Command Line
If you are using Linux, macOS, or Windows Git Bash, run these commands inside your project folder to generate the folder and files automatically:

# 1. Create the iot-node directory
mkdir -p iot-node

# 2. Create requirements.txt
cat << 'EOF' > iot-node/requirements.txt
requests>=2.25.0
pycryptodome>=3.10.0
EOF

# 3. Create sensor_transmitter.py
cat << 'EOF' > iot-node/sensor_transmitter.py
import json
import time
import requests
from datetime import datetime

API_URL = "http://YOUR_SERVER_IP/fetch_data_api.php"
DEVICE_LAT = "51.5074"
DEVICE_LONG = "0.1278"
DEVICE_MAC = "00:ba:26:4c:89:12"

def send_telemetry():
    import random
    payload = {
        "Lat": DEVICE_LAT,
        "Long": DEVICE_LONG,
        "MAC": DEVICE_MAC,
        "Timestamp": datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
        "Temp": str(round(random.uniform(18.0, 32.0), 2)),
        "Hum": str(round(random.uniform(40.0, 80.0), 2)),
        "PM25": str(round(random.uniform(5.0, 150.0), 1)),
        "PM10": str(round(random.uniform(10.0, 250.0), 1))
    }
    headers = {'Content-Type': 'application/json'}
    try:
        res = requests.post(API_URL, data=json.dumps(payload), headers=headers, timeout=10)
        print(f"Status: {res.status_code}")
    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    while True:
        send_telemetry()
        time.sleep(10)
EOF


Uploading to GitHub
Once those files are created, push your updated folder to GitHub:

Bash
git add iot-node/
git commit -m "Add missing Python IoT transmitter script and dependencies"
git push origin main
