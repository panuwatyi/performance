#include <SoftwareSerial.h>
#include "DHT.h"
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
// Set the LCD address to 0x3F for a 16 chars and 2 line display
LiquidCrystal_I2C lcd(0x3F, 16, 2);

SoftwareSerial Genotronex(10, 11); // RX, TX
int ledpin=13; // led on D13 will show blink on / off
int BluetoothData; // the data given from Computer
String inData;
int C_speed=0;
int Mode=1,M_Mode=1;;
#define DHTPIN 2     // what pin we're connected to
#define DHTTYPE DHT11   // DHT 11 
DHT dht(DHTPIN, DHTTYPE);
char buf[10];
String inputString = "";         // a string to hold incoming data
boolean stringComplete = false;  // whether the string is complete

int No1=5;
int No2=6;
int No3=7;
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  Genotronex.begin(9600);
  dht.begin();
 // Genotronex.println("Bluetooth On please press 1 or 0 blink LED ..");
  pinMode(No1,OUTPUT);
  pinMode(No2,OUTPUT);
  pinMode(No3,OUTPUT);
  Serial.println("abcdefg");
  delay(100);
  digitalWrite(No1,HIGH);
  digitalWrite(No2,HIGH);
  digitalWrite(No3,HIGH);
  lcd.begin();
}

void loop() {
  //Read from bluetooth and write to usb serial
  delay(1000);
  int t = dht.readTemperature();
  String myString = String(t);

  Genotronex.flush();
  //Genotronex.print("KT");
  Genotronex.print(myString);
  //Genotronex.print("/");
  if (Mode == 1) 
    Genotronex.print("*1");
  if (Mode == 0)
    Genotronex.print("*0");
  
  if (C_speed==0)
    Genotronex.println("*0");
  else if (C_speed==1)
    Genotronex.println("*1");
  else if (C_speed==2)
    Genotronex.println("*2");
  else if (C_speed==3)
    Genotronex.println("*3"); 

    
  
    
  lcd.setCursor(0, 0);
  if(Mode==0)
    lcd.print("Manual Mode    ");
  else 
    lcd.print("Auto Mode      ");
  lcd.setCursor(0,1);
  lcd.print("T= ");
  lcd.print(t);
  lcd.print(" S= ");
  lcd.print(C_speed);
  
  Serial.print(C_speed);
  Serial.print("  ");
  Serial.print(analogRead(0));
  Serial.print("  ");
  Serial.print(analogRead(1));
  Serial.print("  ");
  Serial.print(analogRead(2));
  Serial.print("  ");
  Serial.print(M_Mode);
  Serial.print("  ");
  Serial.print(Mode);
  Serial.print("  ");
  Serial.println(t);
  
  while (Genotronex.available()>0) {
   
  char toSend = (char)Genotronex.read();
  inputString += toSend;
  Serial.println(inputString);
  //Genotronex.println('a');
  //flashLED();
  
  // Process message when new line character is recieved
        if (toSend == '\n')
        {
           
            Serial.print("Arduino Received: ");
            Serial.println(inputString);

            // You can put some if and else here to process the message juste like that:

            if(inputString == "+++\n"){ // DON'T forget to add "\n" at the end of the string.
              Serial.println("OK. Press h for help.");
            }   
            if(inputString=="1\n"){
              digitalWrite(13,HIGH);
              Serial.println("led on");
              //Genotronex.println("LED OFF. Press 1 to LED ON!");              
            }
            if(inputString=="0\n"){
              digitalWrite(13,LOW);
              Serial.println("led off");
              //Genotronex.println("LED OFF. Press 1 to LED ON!"); 
            }
            if((inputString=="S1\n")||(inputString=="ÿS1")||(inputString=="ÿÿS1")||(inputString=="ÿÿÿS1")&&(Mode==0))
            {
              C_speed=1;
            }
            if((inputString=="S2\n")||(inputString=="ÿS2")||(inputString=="ÿÿS2")||(inputString=="ÿÿÿS2")&&(Mode==0))
            {
              C_speed=2;
            }
            if((inputString=="S3\n")||(inputString=="ÿS3")||(inputString=="ÿÿS3")||(inputString=="ÿÿÿS3")&&(Mode==0))
            {
              C_speed=3;
            }
            if((inputString=="S0\n")||(inputString=="ÿS0")||(inputString=="ÿÿS0")||(inputString=="ÿÿÿS0")&&(Mode==0))
            {
              C_speed=0;
            }
            if(inputString=="M\n")
            {
              M_Mode=3;
            }
            if(inputString=="A\n")
            {
              M_Mode=1;
            }
              

            inputString = ""; // Clear recieved buffer
        }
  }
  
 //Manual Mode
  if(analogRead(0)>500){
      C_speed=1;
      Mode=0;}
  if(analogRead(1)>500){
      C_speed=2;
      Mode=0;}
  if(analogRead(2)>500){
      C_speed=3;
      Mode=0;}
  if((analogRead(0)<500)&&(analogRead(1)<500)&&(analogRead(2)<500)&&(M_Mode==1))
     Mode=1;
  if((analogRead(0)>500)||(analogRead(1)>500)||(analogRead(2)>500)||(M_Mode==3))
     Mode=0;
 
 //Auto Mode 
 if(Mode==1){
   if(t>=32){
     C_speed=3;
   }
   else if ((t<=31)&&(t>28)){
    C_speed=2; 
   }
   else if ((t<=28)&&(t>=25)){
    C_speed=1; 
   }
   else if (t<25)
    C_speed=0;
 }

  if(C_speed==1){
      digitalWrite(No1,LOW);
      digitalWrite(No2,HIGH);
      digitalWrite(No3,HIGH);
  }
  else if(C_speed==2){
      digitalWrite(No1,HIGH);
      digitalWrite(No2,LOW);
      digitalWrite(No3,HIGH);
  }
  else if(C_speed==3){
      digitalWrite(No1,HIGH);
      digitalWrite(No2,HIGH);
      digitalWrite(No3,LOW);
  }
  else {
      digitalWrite(No1,HIGH);
      digitalWrite(No2,HIGH);
      digitalWrite(No3,HIGH);
  }


}
