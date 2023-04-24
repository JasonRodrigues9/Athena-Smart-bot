import cv2
 
from fer import FER
 
import matplotlib.pyplot as plt
 
import matplotlib.image as mpimg

import mediapipe as mp
from cvzone.FaceDetectionModule import FaceDetector
from cvzone.SerialModule import SerialObject
import time
from timeit import default_timer as timer
from flask import Flask, render_template
# Load the cascade
app = Flask(__name__, template_folder='templates')
face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')

# To capture video from webcam. 
cap = cv2.VideoCapture(0)
detector = FaceDetector()
nodemcu = SerialObject("COM3")
emotion_detector = FER()
# To use a video file as input 
# cap = cv2.VideoCapture('filename.mp4')

###FUNCTION DEFINITION FOR PROMINENT EMOTION AND IF FACE DETECTED
def emo_checker(faces):
    if len(faces) != 0: #if face detected tupple(faces) is filled if not then null
        print("Detected")  # eg : Face Detected => [[258 264 201 201]] Face Not Detected => ()
        emotion,score = emotion_detector.top_emotion(img)
        print(emotion)
        if emotion=="happy":
                nodemcu.sendData([1])
        elif emotion=="angry":
                nodemcu.sendData([2])
        elif emotion=="sad":
                nodemcu.sendData([3])
        elif emotion=="suprised":
                nodemcu.sendData([4])
        elif emotion=="disgust":
                nodemcu.sendData([5])
    else:
        print("Not Detected")
        nodemcu.sendData([0])
###

###
while True:
    # Read the frame
    _, img = cap.read()
    # Convert to grayscale
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    # Detect the faces
    

    faces = face_cascade.detectMultiScale(gray, 1.1, 4)
    # Draw the rectangle around each face
    for (x, y, w, h) in faces:
        cv2.rectangle(img, (x, y), (x+w, y+h), (255, 0, 0), 2)
    # Display
    cv2.imshow('img', img)
    # Stop if escape key is pressed
    print(faces)
    emo_checker(faces)
    k = cv2.waitKey(30) & 0xff
    if k==27:
        break
# Release the VideoCapture object
cap.release()