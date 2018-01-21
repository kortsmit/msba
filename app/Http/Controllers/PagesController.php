<?php

namespace App\Http\Controllers;

use League\CommonMark\Converter;

class PagesController extends Controller
{
    protected $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Create the home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Create the workshop notes page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notes()
    {
        $notes = $this->parseMarkdown();

        return view('notes', ['notes' => $notes]);
    }

    /**
     * Parses the workshop notes markdown.
     *
     * @return string
     */
    public function parseMarkdown(): string
    {
        return $this->converter->convertToHtml($this->markdown());
    }

    /**
     * Returns the markdown to be parsed .
     *
     * @return string
     */
    public function markdown(): string
    {
        return "
# Introduction

1. Introduction
2. I attempted to prepare material that should take around two hours to 
    get through, but of course I did not get to time how long it would 
    take with a class following along. If we do not make it through everything 
    or you're not quite able to keep up following along, I'll be making all 
    of the notes for the workshop available to you. So, don't feel like 
    you need to follow along the entire time.

# Git

## Part 1 - Configuration

1. Does everyone have GIT installed and Git Bash available? GitHub Desktop?
    - Please install them if not
2. Has anyone used GIT or GitHub before this class 
3. Configuration steps:
    - `git config --global user.name 'Tim Kortsmit'`
    - `git config --global user.email 'tim@kortsmit.com'`
    - `git config --global core.editor 'subl -n -w'`
    - `git config --list`

## Part 1 - Basic Changes:

For all of the basics steps in working with GitHub, we will quickly go 
through and create a repository and work through a few example changes 
and commits. These are some of the most common commands that you will be 
using if you work with GIT on a day to day basis.

0. At any time, you can run `git --help` to get an exact list of commands available 
    or `git help [command]` to get even more information about a specific command
1. `code` to switch to my workspace where I keep my GIT repositories
2. `mkdir github-workshop` to create a new folder
3. `cd github-workshop` to switch into it
4. `touch file1.txt file2.txt file3.txt` to quickly create a few files in the folder 
5. `git init` to initialize the folder as a git repository. This created a hidden `.git` 
    folder that is used as a form of database to keep track of the GIT repository.
6. `git status` to view the current state of the repository
7. `git add .` to add all files
8. `git commit =m 'Initial commit'` to create our initial commit
9. `date >> file1.txt` to add some content to one of the files
10. `git add -p` for an interactive approach to adding files, which will let you 
    check the changes prior to staging them
11. `git commit -m 'Add date to file 1'` It is important to always keep your message 
    short but descriptive.
12. `git rm file3.txt` to remove the file
13. `git commit -m 'Removing file 3'

## Part 2 - History

The power of Git starts becoming clear when you look at the history of files and your 
project. Some quick example commands:

1. `git log` to view the log of commits on your current branch. We will cover branching 
    later when we discuss workflows.
2. `git log --oneline` For when you are looking at a number of different commits. 
    As you can see, short but descriptive message can become quite important when you 
    have a long history.
3. `git log --graph` to view as a branched structure
4. `git show` is very similar to `git log` but also outputs the changes that were done. 
    Also, by default, it only shows the most recent commit. Git show is great to view 
    information about one single commit.
5. `git diff` is incredibly useful to see differences between files. Can pass a specific 
    commit SHA in order to compare with the current commit. Or, you can pass two specific 
    commits to compare by passing the two SHAs separated by two periods. 

## Part ? - Push to GitHub

I would have covered this later, after talking about workflow, but I wanted to make sure 
we pushed up to GitHub as getting your projects to GitHub is the ultimate goal of 
this workshop.

1. First, lets create a `readme.md` in the main 

## Part ? - Workflow

Think of GIT as a tree with the master branch being the main trunk. And workflow essentially 
means to use branches in GIT that branch or separate your work from that trunk.

1. `git status` will always indicate what branch you are current on, if you do not have your 
    terminal configured as I have mine.
2. `git branch` without parameters to view all local branches and `git branch --list -a` to 
    also view remote branches that are not cloned to your local repository
3. `git branch branch-1` and `git branch branch-2` to create a few branches. These will be 
    based on the current commit of the branch that you are on. Branches are great to keep work 
    separate. A good rule of thumb is to branch early and to branch often.
4. `git branch delete-this` and then you can delete the branch by using 
    `git branch -d delete-this`. I should note, you can not delete the 
    branch you are current on.
5. `git log --oneline --decorate -a`: you can see that all of branches are currently at 
    the same exact commit. Here, `HEAD` indicates the most recent commit for the 
    branch you are currently on.
6. 'git checkout branch-1' to check out another branch to do work on. This works for both 
    local and remote branches.
7. `date >> file2.txt` to make some quite edits
8. `git add .` and `git commit -m \"Add date to file 2\"
9. `git log --oneline --decorate -a`: you can now see that `branch-1` is ahead of the 
    other branches
10. Now, say, we are happy with the changes we've made on `branch-1` and we'd like to 
    bring those changes into the `master` branch: `git checkout master` and then we'll 
    `git merge branch-1`
11. `git log --oneline --decorate -a`: if we run git log again, you can now see that 
    master and branch-1 are now at the same commit

## Part ? - Sharing Work

1. Branching strategies
2. `master` is equivalent to what is currently in production. So, 
3. `develop`
4. Release branches. We name ours to the version on our road map they relate to. 
    For example, we are currently working on `version-1.6`, while our master branch 
    is tagged 
5. Feature branches
6. Bug fix branches
3. Tag releases

# GitHub

## Pull Requests

Pull requests can be used when working with a team as a form of review step to test 
and review new features.

1. 

## Issues

# Advanced Workflow

While we do not have time to go over more advanced work, I wanted to show some very 
quick examples of what can be done when combining GIT, GitHub and other continuous 
integration tools.

## 

# Questions and Comments

I have business cards up front and my personal contact information will also be 
available at [https://msba.kortsmit.com](https://msba.kortsmit.com). If anyone needs 
any help setting up their repositories, has any questions or anything, please do not 
hesitate to reach out. 
        ";
    }
}
