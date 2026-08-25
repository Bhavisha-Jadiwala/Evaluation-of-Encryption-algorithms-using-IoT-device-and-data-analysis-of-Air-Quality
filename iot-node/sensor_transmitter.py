import json
import time
import requests
from datetime import datetime
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad
import base64

# ==========================================
# CONFIGURATION & METADATA
# ==========================================
# Replace with your actual server IP or domain pointing to fetch_data_api.php
API_URL = "http://YOUR_SERVER_IP/fetch_data_api.php"
DEVICE_LAT = "51.5074"
DEVICE_LONG = "0.1278"
DEVICE_MAC = "00:ba:26:4c:89:12"

# 128-bit AES Key & IV (16 bytes each)
AES_KEY = b"aqms_secret_key1"
IV = b"initialvector1234"

# ==========================================
# HELPER FUNCTIONS
# ==========================================
def encrypt_payload(data_dict):
    """Encrypts JSON string using AES-128 CBC mode."""
    raw_text = json.dumps(data_dict).encode('utf-8')
    cipher = AES.new(AES_KEY, AES.MODE_CBC, IV)
    padded_data = pad(raw_text, AES.block_size)
    encrypted_bytes = cipher.encrypt(padded_data)
    return base64.b64encode(encrypted_bytes).decode('utf-8')

def read_sensor_values():
    """Reads or simulates environmental sensors."""
    import random
    return {
        "Temp": round(random.uniform(18.0, 32.0), 2),
        "Hum": round(random.uniform(40.0, 80.0), 2),
        "PM25": round(random.uniform(5.0, 150.0), 1),
        "PM10": round(random.uniform(10.0, 250.0), 1)
    }

# ==========================================
# MAIN EXECUTION LOOP
# ==========================================
def send_telemetry():
    sensors = read_sensor_values()
    timestamp = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    payload = {
        "Lat": DEVICE_LAT,
        "Long": DEVICE_LONG,
        "MAC": DEVICE_MAC,
        "Timestamp": timestamp,
        "Temp": str(sensors["Temp"]),
        "Hum": str(sensors["Hum"]),
        "PM25": str(sensors["PM25"]),
        "PM10": str(sensors["PM10"])
    }

    headers = {'Content-Type': 'application/json'}

    try:
        response = requests.post(API_URL, data=json.dumps(payload), headers=headers, timeout=10)
        print(f"[{timestamp}] Sent successfully. Response: {response.status_code} - {response.text}")
    except Exception as e:
        print(f"[{timestamp}] Transmission Error: {e}")

if __name__ == "__main__":
    print("Starting IoT Air Quality Telemetry Node...")
    while True:
        send_telemetry()
        time.sleep(10)