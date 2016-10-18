#include <SPI.h>
#include <Ethernet.h>
#include <Wire.h>
#include <rgb_lcd.h>

rgb_lcd lcd;

const int colorR = 0;
const int colorG = 0;
const int colorB = 255;
int seco = 0;
int molhado = 0;
int Sensor = A0;
int val;
int pinSound = 8;
int section = 1;

//pino do sensor de temperatura
const int pinTemp = A1;
const int B = 3975;

int pin = 0; // analog pin
int tempc = 0,tempf=0; // temperature variables
int samples[8]; // variables to make a better precision
int maxi = -100,mini = 100; // to start max/min temperature
int i;

// Local Network Settings
byte mac[]     = { 0xD4, 0x28, 0xB2, 0xFF, 0xA0, 0xA1 }; // Must be unique on local network
byte ip[]      = { 192, 168,   1,  13 };                // Must be unique on local network
byte gateway[] = { 192, 168,   1,   1 };
byte subnet[]  = { 255, 255, 255,   0 };

// ThingSpeak Settings
//byte server[]  = { 144, 212, 80, 10 }; // IP Address for the ThingSpeak API

//IPAddress server(144,212,80,10);
IPAddress server(192,168,0,150);
//String writeAPIKey = "QDNHNCLFJB1GTGGD";    // Write API Key for a ThingSpeak Channel
const int updateInterval = 10000;        // Time interval in milliseconds to update ThingSpeak   
EthernetClient client;

// Variable Setup
long lastConnectionTime = 0; 
boolean lastConnected = false;
int resetCounter = 0;
String umidade;
String resposta;
char irrigacao;

void setup()
{
  Ethernet.begin(mac);
  Serial.begin(9600);

  pinMode(pinSound,OUTPUT);

  
  
  lcd.begin(16, 2);  
  lcd.setRGB(colorR, colorG, colorB);
  lcd.print("Talhao 1!");

  delay(30000);
}

void loop()
{
  

  val = analogRead(Sensor);

  if(val > 100 && val < 300){

    umidade = String(10);
    
  }else if(val > 300 && val < 400){ 
    
    umidade = String(8);
   
   }else if (val > 400 && val < 500){
    
    umidade = String(6);
    
    }else if (val > 500 && val < 600){
    
    umidade = String(4);
    
    }
    else if (val > 600 && val < 700){
    
   umidade = String(2);
    
    }else if (val > 700 && val < 900){
    
    umidade = String(0);
    
    }

    //Serial.println(umidade);


    
    int val = analogRead(pinTemp);
    float resistance = (float)(1023-val)*10000/val;
    int calculo = 1/(log(resistance/10000)/B+1/298.15)-273.15;
    String temperatura = String(calculo);
  
 
  
  
  // Desconectando
  if (!client.connected() && lastConnected)
  {
    Serial.println();
    Serial.println("...Disconectado.");
    Serial.println();
    
    client.stop();
  }

  if (client.available())
  {
    char c = client.read();
    resposta += c;
    Serial.print(c);

    if(irrigacao != c){
    lcd.clear();
    resposta.trim();
    if(resposta.length() > 0){
    if(resposta == "1" && section == 0){
    lcd.print("Irrigacao Ligada!");
    lcd.setRGB(255, 0, 0);
    client.stop();
    
    int i = 3,  j = 3;
    
    while(j){
        while(i){
        digitalWrite(pinSound,HIGH);
        delay(100);
        digitalWrite(pinSound,LOW);
        delay(100);
        i--;
        }
      j--;
    }
    
    }else if(resposta == "0"){
    lcd.print("Irrigacao Desligada!");
    lcd.setRGB(0, 0, 255);
    client.stop(); 
    }else{
      
       client.stop(); 
    }
    
    }
    if(c != '\n' && irrigacao != c){
      irrigacao = c;
    }
   }
  }
  
  // Update ThingSpeak
  if(!client.connected() && (millis() - lastConnectionTime > updateInterval))
  {
    updateThingSpeak("field1="+umidade+"&field2="+temperatura);
    Serial.println("Update thingspeak");
  }
  
  lastConnected = client.connected();
}

void updateThingSpeak(String tsData)
{
  if (section == 1) {

    IPAddress server(192,168,0,110);

    if(client.connect(server, 82)){
 
    Serial.println("Conectado no Banco de Dados...");
    Serial.println();
        
    client.print("GET /hackathon/service.php?");
    client.print(tsData);
    client.println("HTTP/1.1");
    client.println("Connection: close");
    //client.print("Content-Length: ");
    //client.print(tsData.length());
    client.println();

    
    
    lastConnectionTime = millis();
    
    resetCounter = 0;
    resposta = "";

    section = 0;
    
    }else {
    Serial.println("Connection Failed.");
    Serial.println();
    
    resetCounter++;
    Serial.println(resetCounter++);
    
    if (resetCounter >=5 ) {resetEthernetShield();}
    
    lastConnectionTime = millis(); 
    } 
    
  }
  else if (section == 0){

    IPAddress server (184, 106, 153, 149);

    if(client.connect(server, 80)){

    client.print("POST /update HTTP/1.1\n");
    client.print("Host: api.thingspeak.com\n");
    client.print("Connection: close\n");
    client.print("X-THINGSPEAKAPIKEY: QDNHNCLFJB1GTGGD\n");
    client.print("Content-Type: application/x-www-form-urlencoded\n");
    client.print("Content-Length: ");
    client.print(tsData.length());
    client.print("\n\n");

    client.print(tsData);

    lastConnectionTime = millis();
    
    resetCounter = 0;
    resposta = "";

    section = 1;

   }else {
    Serial.println("Connection Failed.");
    Serial.println();
    
    resetCounter++;
    Serial.println(resetCounter++);
    
    if (resetCounter >=5 ) {resetEthernetShield();}
    
    lastConnectionTime = millis(); 
    
    
     }
  }

}

void resetEthernetShield()
{
  Serial.println("Resetting Ethernet Shield.");   
  Serial.println();
  
  client.stop();
  delay(1000);
  
  Ethernet.begin(mac);
  delay(1000);
}
