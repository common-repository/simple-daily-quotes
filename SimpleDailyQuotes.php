<?php
/*
Plugin Name: Simple Daily Quotes
Plugin URI: http://www.dailyquotes.org/simple-daily-quotes/
Description: Displays great inspirational hand picked quotes in your blog's sidebar, daily or randomly. Your visitors can tweet quote with single click. You can choose which quotes to display which day, you can edit and add your own quotes. There more than 250 unique quotes. To install, click activate and then go to Appearance > Widgets to find 'Simple Daily Quotes'. All settings are contained within the widget. Visit plugin homepage for help about editing/adding quotes.
 
Version: 0.1
Author: Jovica Ilic
Author URI: http://www.jovicailic.com
*/

add_action("widgets_init", array('SimpleDailyQuotes', 'register'));
register_activation_hook( __FILE__, array('SimpleDailyQuotes', 'activate'));
register_deactivation_hook( __FILE__, array('SimpleDailyQuotes', 'deactivate'));

/*Copyright (C) 2012  Jovica Ilic

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


class SimpleDailyQuotes {
  function activate(){
    $data = array('title' => 'Simple Daily Quotes', 'update' => 'Daily', 'credit' => 'Yes', 'vtweet' => 'Yes');
    if ( ! get_option('SimpleDailyQuotes')){
      add_option('SimpleDailyQuotes' , $data);
    } else {
      update_option('SimpleDailyQuotes' , $data);
    }
  }
  
 function control(){
  $data = get_option('SimpleDailyQuotes');
  ?>
    <p><label>Widget Title: <input name="SimpleDailyQuotes_title"
type="text" value="<?php echo $data['title']; ?>" /></label></p>
<p><label>Load Quotes:</label> 
  <select name="SimpleDailyQuotes_update">
  <option <?php if ($data['update'] == "Daily"){echo 'selected="selected"';} ?>>Daily</option>
  <option <?php if ($data['update'] == "Random"){echo 'selected="selected"';} ?>>Random</option>
</select></p>

<p><label>Visitors can tweet? </label>
  <select name="SimpleDailyQuotes_vtweet">
  <option <?php if ($data['vtweet'] == "Yes"){echo 'selected="selected"';} ?>>Yes</option>
  <option <?php if ($data['vtweet'] == "No"){echo 'selected="selected"';} ?>>No</option>
</select></p>

<p><label>Promote plugin? </label>
  <select name="SimpleDailyQuotes_credit">
  <option <?php if ($data['credit'] == "Yes"){echo 'selected="selected"';} ?>>Yes</option>
  <option <?php if ($data['credit'] == "No"){echo 'selected="selected"';} ?>>No</option>
</select></p>

<p><label>Please donate. Every cent appreciated!</label>
<a href="http://www.dailyquotes.org/simple-daily-quotes/">
<img border="0" src="http://www.dailyquotes.org/wp-content/uploads/2012/02/mbdonate.gif" alt="Donate to Simple Daily Quotes" width="220" height="80" />
</a>
</p>

<p><b>Load Quotes:</b><br/>
<b>Daily:</b> Loads quote every day<br/> 
<b>Random:</b> Loads quote on each visit<br/>
</p>

  <?php
   if (isset($_POST['SimpleDailyQuotes_title'])){
   	$data['title'] = attribute_escape($_POST['SimpleDailyQuotes_title']);
    $data['update'] = attribute_escape($_POST['SimpleDailyQuotes_update']);
    $data['credit'] = attribute_escape($_POST['SimpleDailyQuotes_credit']);
	
	$data['vtweet'] = attribute_escape($_POST['SimpleDailyQuotes_vtweet']);
	
    update_option('SimpleDailyQuotes', $data);
  }
}

  function deactivate(){
    delete_option('SimpleDailyQuotes');
  }
  function widget($args){
  	$data = get_option('SimpleDailyQuotes');
    echo $args['before_widget'];
    echo $args['before_title'] . $data['title'] . $args['after_title'];
    
        
/* Display Quotes */


$quotes = array(
/* 1st Jan */"Do not wait to strike till the iron is hot;
But make it hot by striking.- William B. Sprague",

/* 2nd Jan */"It is hard to fail, but it is worse never to have tried to succeed.
- Theodore Roosevelt ",

/* 3rd Jan */"Fortune favors the brave.
- Publius Terence",

/* 4th Jan */"There is only one success –
To be able to spend your life in your own way.
- Christopher Morley",

/* 5th Jan */"People often say that motivation doesn't last.
Well, neither does bathing–That's why we recommend it daily.
- Zig Ziglar",

/* 6th Jan */"“That some achieve great success,
Is proof to all that others can achieve it as well. - Abraham Lincoln",

/* 7th Jan */"People seldom see the halting and painful steps
By which the most insignificant success is achieved. - Anne Sullivan",

/* 8th Jan */"Real difficulties can be overcome;
It is only the imaginary ones that are unconquerable.
- Theodore N. Vail",

/* 9th Jan */"Our greatest battles are that with our own minds. - Jameson Frank",

/* 10th Jan */"So go ahead and make mistakes.
Make all you can. Because that's where you will find success.
On the far side of failure.
- Thomas J. Watson, Sr.",

/* 11th Jan */"You see things and say, 'Why?,’
But I dream things and say, 'Why not?’ - George Bernard Shaw",

/* 12th Jan */"In the confrontation between the stream and the rock,
The stream always wins – Not through strength, but through persistence.
Buddha",

/* 13th Jan */"Don’t be afraid your life will end;
Be afraid that it will never begin. - Grace Hansen",

/* 14th Jan */"Do not go where the path may lead,
Go instead where there is no path and leave a trail.
- Ralph Waldo Emerson",

/* 15th Jan */"Success often comes to those who dare to act.
It seldom goes to the timid
Who are ever afraid of the consequences. - Jawaharlal Nehru",

/* 16th Jan */"A life spent in making mistakes is not only more honorable,
But more useful than a life spent doing nothing.
- George Bernard Shaw",

/* 17th Jan */"Success is never ending, failure is never final.
- Dr. Robert Schuller",

/* 18th Jan */"Obstacles are those frightful things
You can see when you take your eyes off your goal.
- Henry Ford",

/* 19th Jan */"You will never find time for anything.
You must make it.
- Charles Buxton",

/* 20th Jan */"Success is a journey, not a destination. /
- Ben Sweetland",

/* 21st Jan */"To be successful,
you must decide exactly what you want to accomplish, then resolve to pay the price to get it.
- Bunker Hunt",

/* 22nd Jan */"Don't find fault. Find a remedy. - Henry Ford",

/* 23rd Jan */"It is in the small decisions you and I make every day
that create our destiny.
- Anthony Robbins",

/* 24th Jan */"There are two primary choices in life:
To accept conditions as they exist,
Or accept the responsibility for changing them.
- Denis Waitley",

/* 25th Jan */"Champions aren't made in the gyms.
Champions are made from something they have deep inside them - a desire, a dream, a vision.
- Muhammad Ali",

/* 26th Jan */"The key to happiness is having dreams;
The key to success is making them come true.
- James Allen",

/* 27th Jan */"I start with the premise that
The function of leadership is to produce more leaders,
Not more followers.
- Ralph Nader",

/* 28th Jan */"The man who moved a mountain
Was the one who began carrying away small stones.
- Chinese Proverb",

/* 29th Jan */"It takes 20 years to build a reputation and five minutes to ruin it. If you think about that, you'll do things differently.
- Warren Buffett",

/* 30th Jan */"The secret of success
Is to be ready when your opportunity comes.
- Benjamin Disraeli",

/* 31st Jan */"It's not that I'm so smart;
It's just that I stay with problems longer.
- Albert Einstein",
// -------------- February ----------------------
/* 1st Feb */"We are what we repeatedly do.
Excellence then is not an act but a habit.
- Aristotle",

/* 2nd Feb */"I don't know the key to success,
But the key to failure is trying to please everybody.
- Bill Cosby",

/* 3rd Feb */"As long as you are going to be thinking anyway, think big.
- Donald Trump",

/* 4th Feb */"Successful leaders see the opportunities in every difficulty
Rather than the difficulty in every opportunity.
- Reed Markham",

/* 5th Feb */"Our doubts are traitors
And make us lose the good that we oft may win
By fearing to attempt.
- William Shakespeare",

/* 6th Feb */"Behind every successful man there's a lot of unsuccessful years.
- Bob Brown",

/* 7th Feb */"Well done is better than well said.
- Benjamin Franklin",

/* 8th Feb */"Success is going from failure to failure
Without loss of enthusiasm.
- Winston Churchill",

/* 9th Feb */"Men are born to succeed, not to fail.
- Henry David Thoreau",

/* 10th Feb */"To be a champion,
You have to believe in yourself when nobody else will.
- Sugar Ray Robinson",

/* 11th Feb */"When I was young I observed that
Nine out of ten things I did were failures,
So I did ten times more work.
- Bernard Shaw",

/* 12th Feb */"I can accept failure but I can't accept not trying.
- Michael Jordan",

/* 13th Feb */"The greatest glory in living lies not in never falling,
But in rising every time we fall.
- Nelson Mandela",

/* 14th Feb */"For true success ask yourself these four questions:
Why? Why not? Why not me? Why not now?
- Jimmy Dean",

/* 15th Feb */"You do not pay the price of success,
You enjoy the price of success.
- Zig Ziglar",

/* 16th Feb */"Success seems to be largely a matter of
Hanging on after others have let go.
- William Feather",

/* 17th Feb */"In the middle of difficulty, lies opportunity.
- Albert Einstein",

/* 18th Feb */"The successful man is one who had the chance and took it.
- Roger Babson",

/* 19th Feb */"Make the most of yourself, for that is all there is for you.
- Ralph Waldo Emerson",

/* 20th Feb */"I have failed over and over again - that is why I succeed.
- Michael Jordan",

/* 21st Feb */"The way to succeed is to double your failure rate.
Failure is the opportunity to begin again more intelligently.
- Henry Ford",

/* 22nd Feb */"Spectacular achievements are always preceded
By painstaking preparation.
- Roger Staubach",

/* 23rd Feb */"The journey of a thousand miles begins with one step.
- Lao-Tse",

/* 24th Feb */"We are continually faced by great opportunities
Brilliantly disguised as insoluble problems.
- Lee Iococca",

/* 25th Feb */"Great minds have purpose,
Others have wishes.
- Washington Irving",

/* 26th Feb */"First, say to yourself what you would be,
Then do what you have to do.
- Epictetus",

/* 27th Feb */"A problem is a chance for you to do your best.
- Duke Ellington",

/* 28th Feb */"It is observed that
Successful people get ahead. In the time that other people waste.
- Henry Ford",

/* 29th Feb */"You must have long range goals
To keep from being frustrated
By short-term failures.
- Bob Bales",
// ----------------- March -------------------------
/* 1st March */"I would rather attempt something great and fail
Than attempt to do nothing
And succeed.
- Robert Schuller",

/* 2nd March */"Success is getting what you want.
Happiness is wanting what you get.
- Dale Carnegie",

/* 3rd March */"The time is always right to do what is right. Martin Luther King Jr. ",

/* 4th March */"Motivation alone is not enough. If you have an idiot and you motivate him,now you have a motivated idiot. 
Jim Rohn ",

/* 5th March */"Mysuggestion would be to walk away from the 90% who don't and join the 10% who do. 
Jim Rohn ",

/* 6th March */"When you know what you want,and you want it badly enough,you'll find a way to get it . 
Jim Rohn ",

/* 7th March */"Everything will be ok at the end. If it's not ok, then it's still not the end! - J.I.",

/* 8th March */"Action is the foundational key to all success.
Pablo Picasso",

/* 9th March */"Formal education will make you a living; self-education will make you a fortune.
Jim Rohn",

/* 10th March */"Formula for success: rise early, work hard, strike oil.
J. Paul Getty",

/* 11th March */"I don't know the key to success, but the key to failure is trying to please everybody.
Bill Cosby",

/* 12th March */"If at first you don't succeed, try, try again. Then quit. There's no point in being a damn fool about it.
W. C. Fields",

/* 13h March */"In order to succeed you must fail, so that you know what not to do the next time.
Anthony J. D'Angelo",

/* 14th March */"Most people give up just when they're about to achieve success. They quit on the one yard line. They give up at the last minute of the game one foot from a winning touchdown.
Ross Perot",

/* 15th March */"Success has a simple formula: do your best, and people may like it.
Sam Ewing",

/* 16th March */"Success is a lousy teacher. It seduces smart people into thinking they can't lose.
Bill Gates",

/* 17th March */"Success is getting what you want. Happiness is wanting what you get.
Dale Carnegie",

/* 18th March */"Success is how high you bounce when you hit bottom.
George S. Patton",

/* 19th March */"The most important single ingredient in the formula of success is knowing how to get along with people.
Theodore Roosevelt",

/* 20th March */"Those who have succeeded at anything and don't mention luck are kidding themselves.
Larry King",

/* 21st March */"Winning isn't everything, it's the only thing.
Vince Lombardi",

/* 22nd March */"They can because they think they can.
- Virgil",

/* 23rd March */"The thing always happens that you really believe in; and the belief in a thing makes it happen.
- Frank Loyd Wright",

/* 24th March */"The secret of success is to know something nobody else knows.
- Aristotle Onassis",

/* 25th March */"Go confidently in the direction of your dreams. Live the life you have imagined.
 - Henry David Thoreau",

/* 26th March */"The future belongs to those who believe in the beauty of their dreams.
- Eleanor Roosevelt",

/* 27th March */"Never say more than is necessary.
- Richard Brinsley Sheridan",

/* 28th March */"If you don't know where you are going,
you'll end up some place else.
 - Yogi Berra",

/* 29th March */"The shortest way to do many things is to do only one thing at a time.
- Richard Cech",

/* 30th March */"We don't live in a world of reality,
we live in a world of perceptions.
 - Gerald J. Simmons",

/* 31st March */"The first and greatest commandment is,
Don't let them scare you.
- Elmer Davis",
// --------------- April -----------------------
/* 1st April */"Find somebody to be successful for. Raise their hopes. Think of their needs. - Barack Obama",

/* 2nd April */"Success will never be a big step in the future, success is a small step taken just now. - Jonatan Mårtensson",

/* 3rd April */"If at first you do succeed - try to hide your astonishment. - Author Unknown",

/* 4th April */"Quality questions create a quality life. Successful people ask better questions, and as a result, they get better answers. - Anthony Robbins",

/* 5th April */"The people who succeed the most are the people who have failed the most, because they are people who have tried the most. - Unknown",

/* 6th April */"Too many of us are not living our dreams because we are living our fears. - Les Brown",

/* 7th April */"Opportunity is missed by most people because it is dressed in overalls and looks like work. - Thomas Edison",

/* 8th April */"I will tell you how to become rich. Close the doors. Be fearful when others are greedy. Be greedy when others are fearful. - Warren Buffet",

/* 9th April */"Do the hard jobs first. The easy jobs will take care of themselves. - Dale Carnegie",

/* 10th April */"You don’t have to see the whole staircase, just take the first step. - Martin Luther King, Jr.",

/* 11th April */"Putting off an easy thing makes it hard. Putting off a hard thing makes it impossible. - George Claude Lorimer",

/* 12th April */"To think too long about doing a thing often becomes its undoing. - Eva Young",

/* 13th April */"A year from now you may wish you had started today. - Karen Lamb",

/* 14th April */"How soon ‘not now’ becomes ‘never’. - Martin Luther",

/* 15th April */"Tomorrow is often the busiest day of the week. - Spanish Proverb",

/* 16th April */"Those who know do not speak. Those who speak do not know. ― Lao Tzu",

/* 17th April */"It is difficult, when faced with a situation you cannot control, to admit you can do nothing. ― Lemony Snicket",

/* 18th April */"One thing you can't hide - is when you're crippled inside. ― John Lennon",

/* 19th April */"We don't make mistakes, just happy little accidents. ― Bob Ross",

/* 20th April */"My one regret in life is that I am not someone else. ― Woody Allen",

/* 21st April */"Somewhere, something incredible is waiting to be known. ― Carl Sagan",

/* 22nd April */"You know what's weird? Day by day, nothing seems to change, but pretty soon...everything's different. ― Bill Watterson",

/* 23rd April */"Begin at the beginning and go on till you come to the end; then stop ― Lewis Carroll",

/* 24th April */"I am not afraid of storms, for I am learning how to sail my ship. ― Louisa May Alcott",

/* 25th April */"What matters most is how well you walk through the fire ― Charles Bukowski",

/* 26th April */"Be yourself, no matter what they say. - Sting",

/* 27th April */"Art is not what you see, but what you make others see. ― Edgar Degas",

/* 28th April */"Life isn't fair, it's just fairer than death, that's all. ― William Goldman",

/* 29th April */"When I do good, I feel good. When I do bad, I feel bad. That's my religion. ― Abraham Lincoln",

/* 30th April */"Sometimes you make choices in life and sometimes choices make you. ― Gayle Forman",
// ------------ May --------------------

/* 1st May */"",



/* 2nd May 8 */"Commitment leads to action. Action brings your dream closer. 
- Marcia Wieder ",

/* 3rd May 8 */"Change will not come if we wait for some other person or some other time. We are the ones we've been waiting for. We are the change that we seek. 
- Barack Obama",

/* 4th May 8 */"Nothing can stop the man with the right mental attitude from achieving his goal; nothing on earth can help the man with the wrong mental attitude. 
- Thomas Jefferson ",

/* 5th May 8 */"Man, alone, has the power to transform his thoughts into physical reality; man, alone, can dream and make his dreams come true. 
- Napoleon Hill",

/* 6th May 8 */"Try not to become a man of success but a man of value. 
- Albert Einstein ",

/* 7th May 8 */"People who don't take risks generally make about two big mistakes a year. People who do take risks generally make about two big mistakes a year. 
- Peter Drucker",

/* 8th May 8 */"Cherish your visions and your dreams as they are the children of your soul, the blueprints of your ultimate achievements. 
- Napoleon Hill",

/* 9th May 8 */"I am careful not to confuse excellence with perfection. Excellence, I can reach for; perfection is God's business. 
- Michael J. Fox ",

/* 10th May 8 */"Old friends pass away, new friends appear. It is just like the days. An old day passes, a new day arrives. The important thing is to make it meaningful: a meaningful friend - or a meaningful day. 
- Dalai Lama",

/* 11th May 8 */"When I let go of what I am, I become what I might be
- Lao Tzu",

/* 12th May 8 */"An eye for an eye only ends up making the whole world blind. 
- Mohandas Gandhi",

/* 13th May 8 */"Every artist was first an amateur. 
- Ralph Waldo Emerson ",

/* 14th May 8 */"People often say that this or that person has not yet found himself. But the self is not something one finds, it is something one creates.
- Thomas S. Szasz",

/* 15th May 8 */"Unless you try to do something beyond what you have already mastered, you will never grow.
- Ralph Waldo Emerson",

/* 16th May 8 */"There are no such things as limits to growth, because there are no limits to the human capacity for intelligence, imagination, and wonder
- Ronald Reagan",

/* 17th May 8 */"History is a relentless master. It has no present, only the past rushing into the future. To try to hold fast is to be swept aside. 
- John F. Kennedy",

/* 18th May 8 */"Look at everything as though you were seeing it either for the first or last time. Then your time on earth will be filled with glory. 
- Betty Smith ",

/* 19th May 8 */"Many of life's failures are people who did not realize how close they were to success when they gave up. 
- Thomas Edison ",

/* 20th May 8 */"It doesn't matter where you are coming from. All that matters is where you are going. 
- Brian Tracy ",

/* 21st May 8 */"Instead of worrying about what people say of you, why not spend time trying to accomplish something they will admire. 
- Dale Carnegie",

/* 22nd May 8 */"All our dreams can come true, if we have the courage to pursue them. 
- Walt Disney",

/* 23rd May 8 */"A person who has a cat by the tail knows a whole lot more about cats than someone who has just read about them. 
- Mark Twain ",

/* 24th May 8 */"Be Content with what you have; rejoice in the way things are. When you realize there is nothing lacking, the whole world belongs to you.
- Lao Tzu",

/* 25th May 8 */"The future belongs to those who believe in the beauty of their dreams. 
- Eleanor Roosevelt ",

/* 26th May 8 */"A dog is not considered a good dog because he is a good barker. A man is not considered a good man because he is a good talker. 
- Buddha",

/* 27th May 8 */"Wealth, like happiness, is never attained when sought after directly. It comes as a by-product of providing a useful service. 
- Henry Ford",

/* 28th May 8 */"Don't judge those who try and fail, judge those who fail to try. 
- Unknown ",

/* 29th May 8 */"I can accept failure, everyone fails at something. But I can't accept not trying. 
- Michael Jordan",

/* 30th May 8 */"Every great man, every successful man, no matter what the field of endeavor, has known the magic that lies in these words: every adversity has the seed of an equivalent or greater benefit. 
- W. Clement Stone",

/* 31st May 8 */"Opportunities are like sunrises. If you wait too long, you miss them. 
- Unknown ",
//------------- June ------------------
/* 1st June */"Once you have mastered time, you will understand how true it is that most people overestimate what they can accomplish in a year - and underestimate what they can achieve in a decade. 
- Tony Robbins",

/* 2nd June */"The only thing in life achieved without effort is failure. 
- Unknown ",

/* 3rd June */"If I'd had some set idea of a finish line, don't you think I would have crossed it years ago? 
- Bill Gates",

/* 4th June */"The truth is that there is nothing noble in being superior to somebody else. The only real nobility is in being superior to your former self. 
- Whitney Young ",

/* 5th June */"Success isn't a result of spontaneous combustion. You must set yourself on fire. 
- Arnold H. Glasow",

/* 6th June */"He who is not contented with what he has, would not be contented with what he would like to have. 
- Socrates ",

/* 7th June */"The man of wisdom is never of two minds; the man of benevolence never worries; the man of courage is never afraid. 
- Confucius ",

/* 8th June */"Most people have no idea of the giant capacity we can immediately command when we focus all of our resources on mastering a single area of our lives. 
- Tony Robbins",

/* 9th June */"A friend is one who knows us, but loves us anyway. 
- Jerome Cummings ",

/* 10th June */"Are you bored with life? Then throw yourself into some work you believe in with all your heart, live for it, die for it, and you will find happiness that you had thought could never be yours. 
- Dale Carnegie",

/* 11th June */"Failure is not a single, cataclysmic event. You don't fail overnight. Instead, failure is a few errors in judgement, repeated every day. 
- Jim Rohn",

/* 12th June */"Do not anticipate trouble, or worry about what may never happen. Keep in the sunlight. 
- Benjamin Franklin ",

/* 13th June */"Happiness depends more on the inward disposition of mind than on outward circumstances. 
- Benjamin Franklin ",

/* 14th June */"Stretching his hand up to reach the stars, too often man forgets the flowers at his feet. 
- Jeremy Bentham",

/* 15th June */"What we plant in the soil of contemplation, we shall reap in the harvest of action. 
- Meister Eckhart",

/* 16th June */"When you see a man of worth, think of how you may emulate him. When you see one who is unworthy, examine yourself. 
- Confucius ",

/* 17th June */"Success is getting what you want. Happiness is wanting what you get. 
- Dale Carnegie ",

/* 18th June */"Justice consists not in being neutral between right and wrong, but in finding out the right and upholding it, wherever found, against the wrong. 
- Theodore Roosevelt ",

/* 19th June */"Don't aim for success if you want it; just do what you love and believe in, and it will come naturally. 
- David Frost",

/* 20th June */"I never think of the future - it comes soon enough. 
- Albert Einstein ",

/* 21st June */"A real decision is measured by the fact that you've taken a new action. If there's no action, you haven't truly decided. 
- Tony Robbins",

/* 22nd June */"Happy are those who dream dreams and are ready to pay the price to make them come true. 
- Leon J. Suenes ",

/* 23rd June */"The only way of finding the limits of the possible is by going beyond them into the impossible. 
- Arthur C. Clarke ",

/* 24th June */"You cannot dream yourself into a character: you must hammer and forge yourself into one. 
- Henry D. Thoreau ",

/* 25th June */"Knowing is not enough; we must apply. Willing is not enough; we must do. 
- Johann Wolfgang von Goethe ",

/* 26th June */"Think twice before you speak, because your words and influence will plant the seed of either success or failure in the mind of another. 
- Napoleon Hill",

/* 27th June */"It is better to conquer yourself than to win a thousand battles. Then the victory is yours. It cannot be taken from you, not by angels or by demons, heaven or hell. 
- Buddha",

/* 28th June */"Keep steadily before you the fact that all true success depends at last upon yourself. 
- Theodore T. Hunger ",

/* 29th June */"I've learned that people will forget what you said, people will forget what you did, but people will never forget how you made them feel. 
- Maya Angelou ",

/* 30th June */"The talent of success is nothing more than doing what you can do, well. 
- Henry W. Longfellow ",
// ------------------- July -----------------------
/* 1st July */"When you dance, your purpose is not to get to a certain place on the floor. It's to enjoy each step along the way.
- Wayne Dyer",

/* 2nd July */"I try to learn from the past, but I plan for the future by focusing exclusively on the present. That's were the fun is. 
- Donald Trump",

/* 3rd July */"Whether you think that you can, or that you can't, you are usually right.
- Henry Ford",

/* 4th July */"We are all faced with a series of great opportunities brilliantly disguised as impossible situations.
- Charles R. Swindoll",

/* 5th July */"Don't hold to anger, hurt or pain. They steal your energy and keep you from love. 
- Leo Buscaglia ",

/* 6th July */"If you want others to be happy, practice compassion. If you want to be happy, practice compassion. 
- Dalai Lama",

/* 7th July */"Life shrinks or expands in proportion to one's courage. 
- Anais Nin ",

/* 8th July */"There is only one person who could ever make you happy, and that person is you. 
- David Burns ",

/* 9th July */"Be careful the environment you choose for it will shape you; be careful the friends you choose for you will become like them. 
- W. Clement Stone",

/* 10th July */"Whatever the mind of man can conceive and believe, it can achieve. 
- W. Clement Stone ",

/* 11th July */"I've learned that you shouldn't go through life with a catcher's mitt on both hands; you need to be able to throw something back. 
- Maya Angelou",

/* 12th July */"Give me a stock clerk with a goal and I’ll give you a man who will make history. Give me a man with no goals and I’ll give you a stock clerk. 
- J.C. Penney",

/* 13th July */"Sing like no one's listening, love like you've never been hurt, dance like nobody's watching, and live like its heaven on earth.
- Mark Twain",

/* 14th July */"Early to bed, early to rise, makes a man healthy, wealthy and wise
- Benjamin Franklin",

/* 15th July */"Success is not final, failure is not fatal: it is the courage to continue that counts.
- Winston Churchill",

/* 15th July */"Know where to find the information and how to use it - That's the secret of success.
- Albert Einstein",

/* 16th July */"Do not be too moral. You may cheat yourself out of much life. Aim above morality. Be not simply good; be good for something. 
- Henry David Thoreau ",

/* 17th July */"I've failed over and over and over again in my life and that is why I succeed. 
- Michael Jordan",

/* 18th July */"Anyone who stops learning is old, whether at twenty or eighty. Anyone who keeps learning stays young. The greatest thing in life is to keep your mind young. 
- Henry Ford",

/* 19th July */"A successful man is one who can lay a firm foundation with the bricks others have thrown at him. 
- David Brinkley ",

/* 20th July */"I don't know the key to success, but the key to failure is trying to please everybody. 
- Bill Cosby",

/* 21st July */"Success is how high you bounce when you hit bottom. 
- George S. Patton ",

/* 22nd July */"Today, the greatest single source of wealth is between your ears. Today, wealth is contained in brainpower, not brutepower 
- Brian Tracy ",

/* 23rd July */"You can't expect abundance to work in just one direction. If the tide only came in we would all drown. 
- Unknown ",

/* 24th July */"If you have built castles in the air, your work need not be lost; that is where they should be. Now put foundations under them. 
- Henry David Thoreau ",

/* 25th July */"If there is any one secret of success, it lies in the ability to get the other person's point of view and see things from that person's angle as well as from your own. 
- Henry Ford",

/* 26th July */"People take different roads seeking fulfillment and happiness. Just because they're not on your road doesn't mean they've gotten lost. 
- Dalai Lama ",

/* 27th July */"Happiness is not achieved by the conscious pursuit of happiness; it is generally the by-product of other activities. 
- Aldous Huxley ",

/* 28th July */"Great spirits have always encountered violent opposition from mediocre minds. 
- Albert Einstein ",

/* 29th July */"If you are not willing to risk the unusual, you will have to settle for the ordinary. 
- Jim Rohn",

/* 30th July */"Give me six hours to chop down a tree and I will spend the first four sharpening the axe. 
- Abraham Lincoln",

/* 31st July */"The difference between a successful person and others is not a lack of strength, not a lack of knowledge, but rather a lack in will. 
- Vince Lombardi ",
//-------------- August --------------------
/* 1st August */"You can't build a reputation on what you are going to do. 
- Henry Ford ",

/* 2nd August */"I never looked at the consequences of missing a big shot... when you think about the consequences you always think of a negative result. 
- Michael Jordan",

/* 3rd August */"In the hopes of reaching the moon men fail to see the flowers that blossom at their feet. 
- Albert Schweitzer ",

/* 4th August */"It is literally true that you can succeed best and quickest by helping others to succeed. 
- Napoleon Hill",

/* 5th August */"Nothing is predestined: The obstacles of your past can become the gateways that lead to new beginnings. 
- Ralph Blum ",

/* 6th August */"In order to succeed, your desire for success should be greater than your fear of failure.
- Bill Cosby",

/* 7th August */"The two most important requirements for major success are: first, being in the right place at the right time, and second, doing something about it.
- Ray Kroc",

/* 8th August */"Instead of worrying about what people say of you, why not spend time trying to accomplish something they will admire.
- Dale Carnegie",

/* 9th August */"Your imagination is your preview of life's coming attractions. 
- Albert Einstein ",

/* 10th August */"You must give some time to your fellow men. Even if it's a little thing, do something for others - something for which you get no pay but the privilege of doing it. 
- Albert Schweitzer ",

/* 11th August */"In the absence of clearly-defined goals, we become strangely loyal to performing daily trivia until ultimately we become enslaved by it. 
- Robert Heinlein ",

/* 12th August */"A hero is no braver than an ordinary man, but he is braver five minutes longer. 
- Ralph Waldo Emerson ",

/* 13th August */"There is no passion to be found playing small - in settling for a life that is less than the one you are capable of living. 
- Nelson Mandela",

/* 14th August */"I know of no more encouraging fact than the unquestionable ability of man to elevate his life by conscious endeavor. 
- Henry David Thoreau",

/* 15th August */"The big secret in life is that there is no big secret. Whatever your goal, you can get there if you're willing to work. 
- Oprah Winfrey ",

/* 16th August */"Happiness is not something you postpone for the future; it is something you design for the present. 
- Jim Rohn",

/* 17th August */"For to be free is not merely to cast off one's chains, but to live in a way that respects and enhances the freedom of others. 
- Nelson Mandela",

/* 18th August */"All growth depends upon activity. There is no development physically or intellectually without effort, and effort means work. 
- Calvin Coolidge ",

/* 19th August */"It was a high counsel that I once heard given to a young person, \"Always do what you are afraid to do.\" 
- Ralph Waldo Emerson ",

/* 20th August */"Being deeply loved by someone gives you strength, while loving someone deeply gives you courage.
- Lao Tzu",

/* 21st August */"Success is the good fortune that comes from aspiration, desperation, perspiration and inspiration. 
- Evan Esar ",

/* 22nd August */"Success does not consist in never making blunders, but in never making the same one a second time. 
- Josh Billings ",

/* 23rd August */"The great thing in the world is not so much where we stand as in what direction we are moving. 
- Oliver Wendell Holmes ",

/* 24th August */"Thousands of candles can be lit from a single candle, and the life of the candle will not be shortened. Happiness never decreases by being shared.
- Buddha",

/* 25th August */"Only after we can learn to forgive ourselves can we accept others as they are because we don't feel threatened by anything about them which is better than us.
- Stephen Covey",

/* 26th August */"When you judge another, you do not define them, you define yourself.
- Wayne Dyer",

/* 27th August */"After the game, the king and the pawn go into the same box. 
- Italian Proverb ",

/* 28th August */"We are the creative force of our life, and through our own decisions rather than our conditions, if we carefully learn to do certain things, we can accomplish those goals. 
- Stephen Covey",

/* 29th August */"Character is like a tree and reputation like a shadow. The shadow is what we think of it; the tree is the real thing. 
- Abraham Lincoln",

/* 30th August */"People who are always making allowances for themselves soon go bankrupt.
- Mary Pettibone Poole",


/* 31st August */"Wise men speak because they have something to say; fools because they have to say something. ― Plato ",
// --------------- September ---------------

/* 1st September */"Have your adventures, make your mistakes, and choose your friends poorly -- all these make for great stories. ― Chuck Palahniuk",

/* 2nd September */"Monsters are real, and ghosts are real too. They live inside us, and sometimes, they win. - Stephen King",

/* 3rd September */"You have not failed until you quit trying. - Gordon B. Hinckley",

/* 4th September */"Remember: the time you feel lonely is the time you most need to be by yourself. Life's cruelest irony. ― Douglas Coupland",

/* 5th September */"I not only use all the brains that I have, but all I can borrow. - Woodrow Wilson",

/* 6th September */"Learn from the mistakes of others. You can never live long enough to make them all yourself. - Groucho Marx",

/* 7th September */"What is right is not always popular and what is popular is not always right.” - Albert Einstein",

/* 8th September */"We are what we repeatedly do. Excellence, then, is not an act, but a habit.” - Aristotle",

/* 9th September */"All our dreams can come true, if we have the courage to pursue them.” - Walt Disney Company",

/* 10th September */"An eye for an eye only ends up making the whole world blind. 
- Mohandas Gandhi",

/* 11th September */"Every artist was first an amateur. 
- Ralph Waldo Emerson ",

/* 12th September */"People often say that this or that person has not yet found himself. But the self is not something one finds, it is something one creates.
- Thomas S. Szasz",

/* 13th September */"Unless you try to do something beyond what you have already mastered, you will never grow.
- Ralph Waldo Emerson",

/* 14th September */"There are no such things as limits to growth, because there are no limits to the human capacity for intelligence, imagination, and wonder
- Ronald Reagan",

/* 15th September */"History is a relentless master. It has no present, only the past rushing into the future. To try to hold fast is to be swept aside. 
- John F. Kennedy",

/* 16th September */"Look at everything as though you were seeing it either for the first or last time. Then your time on earth will be filled with glory. 
- Betty Smith ",

/* 17th September */"Many of life's failures are people who did not realize how close they were to success when they gave up. 
- Thomas Edison ",

/* 18th September */"It doesn't matter where you are coming from. All that matters is where you are going. 
- Brian Tracy ",

/* 19th September */"Instead of worrying about what people say of you, why not spend time trying to accomplish something they will admire. 
- Dale Carnegie",

/* 20th September */"All our dreams can come true, if we have the courage to pursue them. 
- Walt Disney",

/* 21st September */"A person who has a cat by the tail knows a whole lot more about cats than someone who has just read about them. 
- Mark Twain ",

/* 22nd September */"Be Content with what you have; rejoice in the way things are. When you realize there is nothing lacking, the whole world belongs to you.
- Lao Tzu",

/* 23rd September */"The future belongs to those who believe in the beauty of their dreams. 
- Eleanor Roosevelt ",

/* 24th September */"A dog is not considered a good dog because he is a good barker. A man is not considered a good man because he is a good talker. 
- Buddha",

/* 25th September */"Wealth, like happiness, is never attained when sought after directly. It comes as a by-product of providing a useful service. 
- Henry Ford",

/* 26th September */"Don't judge those who try and fail, judge those who fail to try. 
- Unknown ",

/* 27th September */"I can accept failure, everyone fails at something. But I can't accept not trying. 
- Michael Jordan",

/* 28th September */"Every great man, every successful man, no matter what the field of endeavor, has known the magic that lies in these words: every adversity has the seed of an equivalent or greater benefit. 
- W. Clement Stone",

/* 29th September */"Opportunities are like sunrises. If you wait too long, you miss them. 
- Unknown ",

/* 30th September */"Once you have mastered time, you will understand how true it is that most people overestimate what they can accomplish in a year - and underestimate what they can achieve in a decade. 
- Tony Robbins",
// ------------- October ------------------
/* 1st October */"The only thing in life achieved without effort is failure. 
- Unknown ",

/* 2nd October */"If I'd had some set idea of a finish line, don't you think I would have crossed it years ago? 
- Bill Gates",

/* 3rd October */"The truth is that there is nothing noble in being superior to somebody else. The only real nobility is in being superior to your former self. 
- Whitney Young ",

/* 4th October */"Success isn't a result of spontaneous combustion. You must set yourself on fire. 
- Arnold H. Glasow",

/* 5th October */"He who is not contented with what he has, would not be contented with what he would like to have. 
- Socrates ",

/* 6th October */"The man of wisdom is never of two minds; the man of benevolence never worries; the man of courage is never afraid. 
- Confucius ",

/* 7th October */"Most people have no idea of the giant capacity we can immediately command when we focus all of our resources on mastering a single area of our lives. 
- Tony Robbins",

/* 8th October */"A friend is one who knows us, but loves us anyway. 
- Jerome Cummings ",

/* 9th October */"Are you bored with life? Then throw yourself into some work you believe in with all your heart, live for it, die for it, and you will find happiness that you had thought could never be yours. 
- Dale Carnegie",

/* 10th October */"Failure is not a single, cataclysmic event. You don't fail overnight. Instead, failure is a few errors in judgement, repeated every day. 
- Jim Rohn",

/* 11th October */"Do not anticipate trouble, or worry about what may never happen. Keep in the sunlight. 
- Benjamin Franklin ",

/* 12th October */"Happiness depends more on the inward disposition of mind than on outward circumstances. 
- Benjamin Franklin ",

/* 13th October */"Stretching his hand up to reach the stars, too often man forgets the flowers at his feet. 
- Jeremy Bentham",

/* 14th October */"What we plant in the soil of contemplation, we shall reap in the harvest of action. 
- Meister Eckhart",

/* 15th October */"When you see a man of worth, think of how you may emulate him. When you see one who is unworthy, examine yourself. 
- Confucius ",

/* 16th October */"Success is getting what you want. Happiness is wanting what you get. 
- Dale Carnegie ",

/* 17th October */"Justice consists not in being neutral between right and wrong, but in finding out the right and upholding it, wherever found, against the wrong. 
- Theodore Roosevelt ",

/* 18th October */"Don't aim for success if you want it; just do what you love and believe in, and it will come naturally. 
- David Frost",

/* 19th October */"I never think of the future - it comes soon enough. 
- Albert Einstein ",

/* 20th October */"A real decision is measured by the fact that you've taken a new action. If there's no action, you haven't truly decided. 
- Tony Robbins",

/* 21st October */"Happy are those who dream dreams and are ready to pay the price to make them come true. 
- Leon J. Suenes ",

/* 22nd October */"The only way of finding the limits of the possible is by going beyond them into the impossible. 
- Arthur C. Clarke ",

/* 23rd October */"You cannot dream yourself into a character: you must hammer and forge yourself into one. 
- Henry D. Thoreau ",

/* 24th October */"Knowing is not enough; we must apply. Willing is not enough; we must do. 
- Johann Wolfgang von Goethe ",

/* 25th October */"Think twice before you speak, because your words and influence will plant the seed of either success or failure in the mind of another. 
- Napoleon Hill",

/* 26h October */"It is better to conquer yourself than to win a thousand battles. Then the victory is yours. It cannot be taken from you, not by angels or by demons, heaven or hell. 
- Buddha",

/* 27th October */"Keep steadily before you the fact that all true success depends at last upon yourself. 
- Theodore T. Hunger ",

/* 28th October */"I've learned that people will forget what you said, people will forget what you did, but people will never forget how you made them feel. 
- Maya Angelou ",

/* 29th October */"The talent of success is nothing more than doing what you can do, well. 
- Henry W. Longfellow ",

/* 30th October */"When you dance, your purpose is not to get to a certain place on the floor. It's to enjoy each step along the way.
- Wayne Dyer",

/* 31st October */"I try to learn from the past, but I plan for the future by focusing exclusively on the present. That's were the fun is. 
- Donald Trump",
//------------ November ---------------
/* 1st November */"Whether you think that you can, or that you can't, you are usually right.
- Henry Ford",

/* 2nd November */"We are all faced with a series of great opportunities brilliantly disguised as impossible situations.
- Charles R. Swindoll",

/* 3rd November */"Don't hold to anger, hurt or pain. They steal your energy and keep you from love. 
- Leo Buscaglia ",

/* 4th November */"If you want others to be happy, practice compassion. If you want to be happy, practice compassion. 
- Dalai Lama",

/* 5th November */"Life shrinks or expands in proportion to one's courage. 
- Anais Nin ",

/* 6th November */"There is only one person who could ever make you happy, and that person is you. 
- David Burns ",

/* 7th November */"Be careful the environment you choose for it will shape you; be careful the friends you choose for you will become like them. 
- W. Clement Stone",

/* 8th November */"Whatever the mind of man can conceive and believe, it can achieve. 
- W. Clement Stone ",

/* 9th November */"I've learned that you shouldn't go through life with a catcher's mitt on both hands; you need to be able to throw something back. 
- Maya Angelou",

/* 10th November */"Give me a stock clerk with a goal and I’ll give you a man who will make history. Give me a man with no goals and I’ll give you a stock clerk. 
- J.C. Penney",

/* 11th November */"Sing like no one's listening, love like you've never been hurt, dance like nobody's watching, and live like its heaven on earth.
- Mark Twain",

/* 12th November */"Early to bed, early to rise, makes a man healthy, wealthy and wise
- Benjamin Franklin",

/* 13th November */"Success is not final, failure is not fatal: it is the courage to continue that counts.
- Winston Churchill",

/* 14th November */"Know where to find the information and how to use it - That's the secret of success.
- Albert Einstein",

/* 15th November */"Do not be too moral. You may cheat yourself out of much life. Aim above morality. Be not simply good; be good for something. 
- Henry David Thoreau ",

/* 16th November */"I've failed over and over and over again in my life and that is why I succeed. 
- Michael Jordan",

/* 17th November */"Anyone who stops learning is old, whether at twenty or eighty. Anyone who keeps learning stays young. The greatest thing in life is to keep your mind young. 
- Henry Ford",

/* 18th November */"A successful man is one who can lay a firm foundation with the bricks others have thrown at him. 
- David Brinkley ",

/* 19th November */"I don't know the key to success, but the key to failure is trying to please everybody. 
- Bill Cosby",

/* 20th November */"Success is how high you bounce when you hit bottom. 
- George S. Patton ",

/* 21st November */"Today, the greatest single source of wealth is between your ears. Today, wealth is contained in brainpower, not brutepower 
- Brian Tracy ",

/* 22nd November */"You can't expect abundance to work in just one direction. If the tide only came in we would all drown. 
- Unknown ",

/* 23rd November */"If you have built castles in the air, your work need not be lost; that is where they should be. Now put foundations under them. 
- Henry David Thoreau ",

/* 24th November */"If there is any one secret of success, it lies in the ability to get the other person's point of view and see things from that person's angle as well as from your own. 
- Henry Ford",

/* 25th November */"People take different roads seeking fulfillment and happiness. Just because they're not on your road doesn't mean they've gotten lost. 
- Dalai Lama ",

/* 26th November */"Happiness is not achieved by the conscious pursuit of happiness; it is generally the by-product of other activities. 
- Aldous Huxley ",

/* 27th November */"Great spirits have always encountered violent opposition from mediocre minds. 
- Albert Einstein ",

/* 28th November */"If you are not willing to risk the unusual, you will have to settle for the ordinary. 
- Jim Rohn",

/* 29th November */"Give me six hours to chop down a tree and I will spend the first four sharpening the axe. 
- Abraham Lincoln",

/* 30th November */"The difference between a successful person and others is not a lack of strength, not a lack of knowledge, but rather a lack in will. 
- Vince Lombardi ",
//--------------- December ----------------
/* 1st December */"You can't build a reputation on what you are going to do. 
- Henry Ford ",

/* 2nd December */"I never looked at the consequences of missing a big shot... when you think about the consequences you always think of a negative result. 
- Michael Jordan",

/* 3rd December */"In the hopes of reaching the moon men fail to see the flowers that blossom at their feet. 
- Albert Schweitzer ",

/* 4th December */"It is literally true that you can succeed best and quickest by helping others to succeed. 
- Napoleon Hill",

/* 5th December */"Nothing is predestined: The obstacles of your past can become the gateways that lead to new beginnings. 
- Ralph Blum ",

/* 6th December */"In order to succeed, your desire for success should be greater than your fear of failure.
- Bill Cosby",

/* 7th December */"The two most important requirements for major success are: first, being in the right place at the right time, and second, doing something about it.
- Ray Kroc",

/* 8th December */"Instead of worrying about what people say of you, why not spend time trying to accomplish something they will admire.
- Dale Carnegie",

/* 9th December */"Your imagination is your preview of life's coming attractions. 
- Albert Einstein ",

/* 10th December */"You must give some time to your fellow men. Even if it's a little thing, do something for others - something for which you get no pay but the privilege of doing it. 
- Albert Schweitzer ",

/* 11th December */"In the absence of clearly-defined goals, we become strangely loyal to performing daily trivia until ultimately we become enslaved by it. 
- Robert Heinlein ",

/* 12th December */"A hero is no braver than an ordinary man, but he is braver five minutes longer. 
- Ralph Waldo Emerson ",

/* 13th December */"There is no passion to be found playing small - in settling for a life that is less than the one you are capable of living. 
- Nelson Mandela",

/* 14th December */"I know of no more encouraging fact than the unquestionable ability of man to elevate his life by conscious endeavor. 
- Henry David Thoreau",

/* 15th December */"The big secret in life is that there is no big secret. Whatever your goal, you can get there if you're willing to work. 
- Oprah Winfrey ",

/* 16th December */"Happiness is not something you postpone for the future; it is something you design for the present. 
- Jim Rohn",

/* 17th December */"For to be free is not merely to cast off one's chains, but to live in a way that respects and enhances the freedom of others. 
- Nelson Mandela",

/* 18th December */"All growth depends upon activity. There is no development physically or intellectually without effort, and effort means work. 
- Calvin Coolidge ",

/* 19th December */"It was a high counsel that I once heard given to a young person, \"Always do what you are afraid to do.\" 
- Ralph Waldo Emerson ",

/* 20th December */"Being deeply loved by someone gives you strength, while loving someone deeply gives you courage.
- Lao Tzu",

/* 21st December */"Success is the good fortune that comes from aspiration, desperation, perspiration and inspiration. 
- Evan Esar ",

/* 22nd December */"Success does not consist in never making blunders, but in never making the same one a second time. 
- Josh Billings ",

/* 23rd December */"The great thing in the world is not so much where we stand as in what direction we are moving. 
- Oliver Wendell Holmes ",

/* 24th December */"Thousands of candles can be lit from a single candle, and the life of the candle will not be shortened. Happiness never decreases by being shared.
- Buddha",

/* 25th December */"Only after we can learn to forgive ourselves can we accept others as they are because we don't feel threatened by anything about them which is better than us.
- Stephen Covey",

/* 26th December */"When you judge another, you do not define them, you define yourself.
- Wayne Dyer",

/* 27th December */"After the game, the king and the pawn go into the same box. 
- Italian Proverb ",

/* 28th December */"We are the creative force of our life, and through our own decisions rather than our conditions, if we carefully learn to do certain things, we can accomplish those goals. 
- Stephen Covey",

/* 29th December */"Character is like a tree and reputation like a shadow. The shadow is what we think of it; the tree is the real thing. 
- Abraham Lincoln",

/* 30th December */"People who are always making allowances for themselves soon go bankrupt.
- Mary Pettibone Poole"

);


$r = rand(0,370);

$i = 0;

while ($i < 366) {
    $dates[$i++] = $i++;
}

$v = date(z);


if ($data['update'] == "Daily"){
	
	echo '<div style ="padding: 10px 0;">';
	echo $quotes[$v].'<br/></div>';
	
} else {

 	echo '<div style ="padding: 10px 0;">';
	echo $quotes[$r].'<br/></div>';
}



if ($data['update'] == "Daily"){
$thelink = "SDQ &nbsp &nbsp &nbsp &nbsp &nbsp";
} else {
$thelink = "SDQ &nbsp &nbsp &nbsp &nbsp &nbsp";
}
		
if ($data['credit'] == "Yes"){
echo 'By <a href="http://www.dailyquotes.org/">'.$thelink.'</a>';} 

if ($data['vtweet'] == "Yes") {
echo '<a title="Tweet this" href="http://twitter.com/home?status='.$quotes[$v].' " target="_blank">Tweet!</a>';} 

echo $args['after_widget'];
  }
  
function register(){
    register_sidebar_widget('Simple Daily Quotes', array('SimpleDailyQuotes', 'widget'));
    register_widget_control('Simple Daily Quotes', array('SimpleDailyQuotes', 'control'));
  }
}



?>