//библиотеки
#include <SPI.h>
#include <Wire.h>
#include <Ethernet.h>
#include <Adafruit_BMP085.h>
#include "DHT.h" //библиотека для DHT11

#define DHTTYPE DHT11
#define DHTPIN 22
DHT dht(DHTPIN, DHTTYPE);
Adafruit_BMP085 bmp;

// assign a MAC address for the ethernet controller.
// fill in your address here:
byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};
// fill in an available IP address on your network here,
// for manual configuration:
IPAddress ip(192, 168, 0, 111);

// fill in your Domain Name Server address here:
IPAddress myDns(8, 8, 8, 8);

// initialize the library instance:
EthernetClient client;

char server[] = "192.168.0.102";
//IPAddress server(64,131,82,241);

unsigned long lastConnectionTime = 0;             // last time you connected to the server, in milliseconds
const unsigned long postingInterval = 10L * 1000L; // delay between updates, in milliseconds
// the "L" is needed to use long type numbers

void setup() {
  // start serial port:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }

  // give the ethernet module time to boot up:
  delay(100);
  // start the Ethernet connection using a fixed IP address and DNS server:
  Ethernet.begin(mac, ip, myDns);
  // print the Ethernet board/shield's IP address:
  Serial.print("My IP address: ");
  Serial.println(Ethernet.localIP());
  dht.begin(); // Запустили датчик температуры и влажности
}

void loop() {

  // if there's incoming data from the net connection.
  // send it out the serial port.  This is for debugging
  // purposes only:
  if (client.available()) {
    char c = client.read();
    Serial.write(c);
  }

  // if ten seconds have passed since your last connection,
  // then connect again and send data:
  if (millis() - lastConnectionTime > postingInterval) {
    httpRequest();
  }

}

// this method makes a HTTP connection to the server:
void httpRequest() {
  
//Блок датчика DHT

    //Читаем влажность заносим в 'h'
  float h = dht.readHumidity();
    
    //Читаем температуру по Цельсию заносим в 'tc'
  float tc = dht.readTemperature();
    
    //Читаем температуру по Фаренгейту то ставим (isFahrenheit = true)
  float tf = dht.readTemperature(true);
    
    //Температура ощущаемая по Фаренгейту (the default)
  float hif = dht.computeHeatIndex(tf, h);
    
      //Температура ощущаемая по Цельсию (isFahreheit = false)
  float hic = dht.computeHeatIndex(tc, h, false);
  
//Блок датчика DHT


  // close any connection before send a new request.
  // This will free the socket on the WiFi shield
  client.stop();

  // if there's a successful connection:
  if (client.connect(server, 80)) {
    Serial.println("connecting...");
    // send the HTTP PUT request:
    client.print("GET /arduino/adddb.php?val=");
    client.print(tc);
    client.print(" HTTP/1.1");
    client.println();
    client.println("Host: 192.168.0.102");
    client.println("User-Agent: arduino-ethernet");
    client.println("Connection: close");
    client.println();

    // note the time that the connection was made:
    lastConnectionTime = millis();
  }
  else {
    // if you couldn't make a connection:
    Serial.println("connection failed");
  }
}
