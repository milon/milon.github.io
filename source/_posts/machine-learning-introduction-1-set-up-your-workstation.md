---
extends: _layouts.post
title: 'Machine Learning Introduction – 1: Set up your workstation'
date: 23-02-2017
gist: Setting up your workstation for practicing Machine Learning.
section: content
---

Recently, we are planning to use machine learning in one of our core product in Telenor Health. So, I am seriously looking into machine learning for the last few days. Though I have a computer science degree, to be honest, I didn't have a good grasp on machine learning rather than having some basic knowledge of some algorithm like linear regression, K nearest neighbor algorithm and some familiarity with some machine learning term like neural network, deep learning etc. Many people are doing machine learning without having CS degree. So I thought, why not give it a try?

![Machine Learning](/images/posts/machine_learning-1024x724.jpg)

I am writing this series in English, though I English is not very good. One reason is this will improve my English writing skill and other thing is my foreign friends could understand what I learn. So, pardon me for my writing.

I knew in the field of machine learning, two languages are very popular. One is R and another is Python. As I am already very familiar with Python, so I am going for Python. First you need to install python and other machine learning library. I assume you have already installed python in your machine. Rather than windows every operating system comes with python installed. If not, then do a quick google search and I guarantee you will figure it out.

Python has some great library for machine learning. I am going to install them right now. I will be using virtualenv for this cause I don't want my machine filled with these libraries. Python has a very popular distribution called Anaconda. If you are using that, you will have lot of these tools already installed. But I am going for the simpler approach. I will be using pip to install these package. But before that, lets start with virtualenv setup. In your terminal just type-

```
pip install virtualenv
```

Then, I am going to create a new environment called env.

```
virtualenv env -p /usr/local/bin/python3
```

I will be using python 3.6 throughout this series. So I pass `-p` flag for the python3 path. As I am in macOS, that is my path. You could find the path by writing `which python3` in the terminal. As the environment is created, then you can activate that by typing-

```
source env/bin/activate
```

Make sure whenever you are working with this setup, you always start is form the terminal. If you close the terminal windows, then the environment will be deactivated. You can also deactivate it by typing-

```
deactivate
```

As, our environment is ready, then lets start with numpy. This is a very popular look for numerical calculation in python.

```
pip install numpy
```

Then we will install two other dependencies named pandas and matplotlib. First one is a data analysis tool and second one is for plotting numerical data into beautiful diagram.

```
pip install pandas matplotlib
```

Then lastly install scikit-learn with pip by following command-

```
pip install scikit-learn
```

Though pip should install all the dependencies of scikit-learn, but for some weird reason, it didn't install scipy. So, we have to install it manually as well.

```
pip install scipy
```

Now, as we have setup all our dependencies, we could check it by running-

```
pip freeze
```

You will find a tons of module installed. Thats because the libraries we installed are dependent on those libraries.

Our machine is ready for doing some fun with machine learning. See you in next episode. Happy learning.

@section('script')

@endsection
