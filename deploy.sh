#!/bin/bash
cd admin.pksaigon.com
git pull origin main

# Copy file .env.prod thành .env
cp .env.prod .env