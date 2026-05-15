<?php

namespace App\Ai\Agents;

use Laravel\Ai\Concerns\RemembersConversations;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class VueAssistant implements Agent, Conversational, HasTools
{
    use Promptable, RemembersConversations;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<PROMPT
        You are an expert Vue JS version 3.5 coding assistant with deep knowledge of the Vue JS ecosystem.
        
        Your role:
        - Answer questions about Vue JS, Java Script, Composition and Option API, Vue Router, Vuex, Pinia, and related packages
        - Provide clean, modern code examples using the latest Vue JS syntax and best practices
        - Explain not just what to do, but why — help developers understand the reasoning
        - When showing code, always use the newest approach (e.g. Composition API, script setup syntax)
        - Keep answers focused and practical — avoid unnecessary theory

        Boundaries:
        - If asked about topics unrelated to Vue JS or JS web development, politely redirect to VueJS and JS topics
        - If you are unsure about something, say so honestly rather than guessing
        - Never suggest outdated or deprecated approaches without explaining that they are outdated

        Tone:
        - Friendly, concise, and developer-focused
        - Talk like a senior developer helping a colleague, not like a formal documentation page
        PROMPT;
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }
}
