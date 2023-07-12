#include <SoftwareSerial.h>
SoftwareSerial Genotronex(10, 11); // RX, TX
String inputString = ""; 

void setup() {
  Serial.begin(9600);
  Genotronex.begin(9600);
}

void loop() {

  Genotronex.print("25");
  Genotronex.print("*1");
  Genotronex.println("*3");
  
  while (Genotronex.available()>0) {
   
      char toSend = (char)Genotronex.read();
      inputString += toSend;
      Serial.println(inputString);
      if (toSend == '\n')
        {
            Serial.print("Arduino Received: ");
            Serial.println(inputString);
            inputString = ""; 
        }
        
   }
   delay(1000);
}
